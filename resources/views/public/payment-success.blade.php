@extends('layouts.public')

@section('title', 'Application Submitted — Payment Success')

@section('content_header')
    <h1>Application Payment Successful</h1>
@endsection

@section('content')

    <div class="form-section">
        <div class="form-section-header" style="background-color: var(--pdf-dark-green); color: #fff;">
            🎉 Payment Successful — Application Activated
        </div>

        <div class="p-4">

            {{-- Success Icon & Banner --}}
            <div class="text-center py-4 mb-4">
                <div class="d-inline-flex align-items-center justify-content-center bg-light text-success rounded-circle border border-success mb-3" style="width: 80px; height: 80px; font-size: 3rem;">
                    ✓
                </div>
                <h3 class="fw-bold approved-text">Payment Confirmed</h3>
                <p class="text-muted">Your application has been successfully verified and is now active.</p>
            </div>

            {{-- Details Table (Print Friendly) --}}
            <div class="mb-4">
                <h5 class="fw-bold mb-3 title-text border-bottom pb-2">Transaction Details</h5>
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th style="width: 35%;">Application Reference No.</th>
                            <td class="fw-bold fs-5 text-dark" style="letter-spacing: 1px;">
                                {{ $referenceNo }}
                            </td>
                        </tr>
                        <tr>
                            <th>Student Name</th>
                            <td>
                                {{ $application->student_name }} {{ $application->father_name }} {{ $application->surname }}
                            </td>
                        </tr>
                        <tr>
                            <th>Form Type</th>
                            <td>
                                <span class="fw-semibold">
                                    {{ $formType === 'lifetime' ? 'Lifetime Scholarship Form' : 'One-Time Scholarship Form' }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Amount Paid</th>
                            <td class="fw-bold text-success">
                                ₹{{ number_format($paymentAmount, 2) }}
                            </td>
                        </tr>
                        <tr>
                            <th>Transaction / Payment ID</th>
                            <td class="text-muted font-monospace">
                                {{ $paymentId }}
                            </td>
                        </tr>
                        <tr>
                            <th>Payment Date</th>
                            <td>
                                {{ $application->updated_at->format('d-M-Y H:i:s') }} (IST)
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Informational Text --}}
            <div class="notice-box mb-4">
                <strong>Next Steps:</strong>
                <ul class="mb-0 mt-2 ps-3">
                    <li>Please print this confirmation or save your <strong>Reference Number ({{ $referenceNo }})</strong> for future communication.</li>
                    <li>The foundation administration team will review your application and documents.</li>
                    <li>For any queries, please reach out to us via our support channels listed below.</li>
                </ul>
            </div>

            {{-- Actions --}}
            <div class="d-flex flex-column flex-md-row gap-3 justify-content-center mt-4 d-print-none">
                <button onclick="window.print()" class="btn btn-outline-dark" style="border-radius: 0; border: 2px solid var(--pdf-black); font-weight: bold; padding: 10px 24px;">
                    🖨️ Print Receipt
                </button>
                <a href="{{ route('public.application.homePage') }}" class="btn text-white" style="background: #2c6e49; border-radius: 0; border: 2px solid var(--pdf-black); font-weight: bold; padding: 10px 24px; transition: background 0.2s;"
                    onmouseover="this.style.background='#1e4d32'"
                    onmouseout="this.style.background='#2c6e49'">
                    ← Go to Homepage
                </a>
            </div>

        </div>
    </div>

@endsection
