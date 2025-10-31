<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #16a34a;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #16a34a;
            margin: 0;
            font-size: 24px;
        }
        .success-icon {
            text-align: center;
            font-size: 48px;
            color: #16a34a;
            margin: 20px 0;
        }
        .content {
            margin: 20px 0;
        }
        .info-box {
            background-color: #f9fafb;
            border-left: 4px solid #16a34a;
            padding: 15px;
            margin: 20px 0;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #e5e7eb;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: 600;
            color: #666;
        }
        .info-value {
            color: #333;
            text-align: right;
        }
        .highlight {
            color: #16a34a;
            font-weight: 600;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            color: #666;
            font-size: 12px;
        }
        .button {
            display: inline-block;
            background-color: #16a34a;
            color: #ffffff;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            margin: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Payment Confirmation</h1>
        </div>

        <div class="success-icon">
            ✓
        </div>

        <div class="content">
            <p>Dear {{ $booking->name }},</p>
            
            <p>We are pleased to confirm that your payment has been successfully processed. Thank you for your booking!</p>

            <div class="info-box">
                <h3 style="margin-top: 0; color: #16a34a;">Payment Details</h3>
                <div class="info-row">
                    <span class="info-label">Invoice Number:</span>
                    <span class="info-value">{{ $invoice->invoice_number }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Transaction Reference:</span>
                    <span class="info-value highlight">{{ $payment->mpesa_receipt_number ?? 'N/A' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Amount Paid:</span>
                    <span class="info-value highlight">KES {{ number_format($payment->amount, 2) }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Payment Date:</span>
                    <span class="info-value">{{ $payment->transaction_date ? \Carbon\Carbon::parse($payment->transaction_date)->format('d M Y, h:i A') : \Carbon\Carbon::now()->format('d M Y, h:i A') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Payment Method:</span>
                    <span class="info-value">M-Pesa</span>
                </div>
            </div>

            <div class="info-box">
                <h3 style="margin-top: 0; color: #16a34a;">Booking Details</h3>
                <div class="info-row">
                    <span class="info-label">Service:</span>
                    <span class="info-value">{{ $booking->service }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Booking Date:</span>
                    <span class="info-value">{{ \Carbon\Carbon::parse($booking->booking_datetime)->format('d M Y, h:i A') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Location:</span>
                    <span class="info-value">{{ $booking->location }}</span>
                </div>
            </div>

            <p style="margin-top: 30px;">Your booking has been confirmed and we look forward to serving you.</p>

            <p>If you have any questions or need to make changes to your booking, please contact us at:</p>
            <p>
                Phone: {{ optional(\App\Models\Setting::first())->mobile ?? '+254 725 959137' }}<br>
                Email: {{ optional(\App\Models\Setting::first())->email ?? 'info@acorn.co.ke' }}
            </p>
        </div>

        <div class="footer">
            <p>This is an automated confirmation email. Please do not reply to this email.</p>
            <p>&copy; {{ date('Y') }} Acorn Special Tutorials. All rights reserved.</p>
        </div>
    </div>
</body>
</html>

