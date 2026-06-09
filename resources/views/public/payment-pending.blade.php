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

            {{-- Payment CTA (stub) --}}
            <div class="text-center mb-3">
                <button class="btn btn-lg w-100 disabled"
                    style="background: #e0e0e0; color: #999; cursor: not-allowed; border-radius: 8px; font-size: 1.1rem;"
                    disabled>
                    🔒 Pay ₹{{ number_format($paymentAmount) }} — Coming Soon
                </button>
                <small class="text-muted d-block mt-2">
                    Online payment via Razorpay will be available shortly.<br>
                    Please contact us for manual payment in the meantime.
                </small>
            </div>

            {{-- Back Link --}}
            <div class="text-center mt-3">
                <a href="{{ route('public.application.homePage') }}" class="btn btn-outline-secondary btn-sm">
                    ← Back to Home
                </a>
            </div>

        </div>
    </div>

@endsection
