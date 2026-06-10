@extends('layouts.public')

@section('title', 'Application Submitted — Payment Pending')

@section('content_header')
    <h1>Application Submitted</h1>
@endsection

@section('content')

    <div class="form-section">
        <div class="form-section-header">
            🎉 Application Received — Payment Required
        </div>

        <div class="p-4">

            {{-- Reference Box --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body text-center py-4">
                    <p class="text-muted mb-1">Your Application Reference Number</p>
                    <div class="fw-bold" style="font-size: 2rem; letter-spacing: 3px; color: #2c6e49;">
                        {{ $referenceNo }}
                    </div>
                    <small class="text-muted">Please save this number for future reference.</small>
                </div>
            </div>

            {{-- Payment Info --}}
            <div class="alert alert-warning d-flex align-items-start gap-3" role="alert">
                <span style="font-size: 1.8rem; line-height:1;">⚠️</span>
                <div>
                    <strong>Your application is NOT yet active.</strong><br>
                    It will only be processed and visible to the admin after successful payment of
                    <strong>₹{{ number_format($paymentAmount) }}</strong>.
                </div>
            </div>

            {{-- Form Type + Amount Summary --}}
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6 border-end">
                            <div class="text-muted small">Form Type</div>
                            <div class="fw-semibold mt-1">
                                @if ($formType === 'lifetime')
                                    <span class="badge" style="background:#1d6fa4; font-size:1rem; padding: 6px 14px;">Lifetime</span>
                                @else
                                    <span class="badge" style="background:#2c6e49; font-size:1rem; padding: 6px 14px;">One-Time</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-muted small">Processing Fee</div>
                            <div class="fw-bold mt-1" style="font-size:1.4rem; color:#c0392b;">
                                ₹{{ number_format($paymentAmount) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Payment Alert for Errors --}}
            @if(session('error'))
                <div class="alert alert-danger mb-4" role="alert">
                    <strong>❌ Payment Failed:</strong> {{ session('error') }}
                </div>
            @endif

            {{-- Payment CTA --}}
            <div class="text-center mb-3">
                @if($orderId)
                    <button id="rzp-button1" class="btn btn-lg w-100 text-white"
                        style="background: #2c6e49; border-radius: 0; font-size: 1.1rem; border: 2px solid var(--pdf-black); font-weight: bold; transition: background 0.2s;"
                        onmouseover="this.style.background='#1e4d32'"
                        onmouseout="this.style.background='#2c6e49'">
                        🔒 Pay ₹{{ number_format($paymentAmount) }} via Razorpay
                    </button>
                    <small class="text-muted d-block mt-2">
                        Online payment via Razorpay. Securely complete your payment.
                    </small>
                @else
                    <button class="btn btn-lg w-100 disabled"
                        style="background: #e0e0e0; color: #999; cursor: not-allowed; border-radius: 0; font-size: 1.1rem; border: 2px solid var(--pdf-black);"
                        disabled>
                        ⚠️ Payment Gateway Offline
                    </button>
                    <small class="text-danger d-block mt-2">
                        Unable to connect to Razorpay. Please refresh the page or try again.
                    </small>
                @endif
            </div>

            {{-- Hidden Form for callback --}}
            @if($orderId)
                <form id="payment-callback-form" action="{{ route('public.application.payment.callback') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                    <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
                    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
                    <input type="hidden" name="reference_no" value="{{ $referenceNo }}">
                </form>
            @endif

            {{-- Back Link --}}
            <div class="text-center mt-3">
                <a href="{{ route('public.application.homePage') }}" class="btn btn-outline-secondary btn-sm" style="border-radius: 0; border: 1.5px solid var(--pdf-black); font-weight: 600;">
                    ← Back to Home
                </a>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    @if($orderId)
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            var options = {
                "key": "{{ config('services.razorpay.key_id') }}",
                "amount": "{{ $paymentAmount * 100 }}",
                "currency": "INR",
                "name": "Hiraba No Khamkar",
                "description": "Scholarship Application Fee ({{ ucfirst($formType) }})",
                "order_id": "{{ $orderId }}",
                "handler": function (response){
                    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                    document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
                    document.getElementById('razorpay_signature').value = response.razorpay_signature;
                    document.getElementById('payment-callback-form').submit();
                },
                "prefill": {
                    "name": "{{ $application->student_name }} {{ $application->father_name }} {{ $application->surname }}",
                    "email": "{{ $application->email }}",
                    "contact": "{{ $application->phone }}"
                },
                "theme": {
                    "color": "#A00000"
                }
            };
            var rzp1 = new Razorpay(options);
            document.getElementById('rzp-button1').onclick = function(e){
                rzp1.open();
                e.preventDefault();
            }
        </script>
    @endif
@endsection
