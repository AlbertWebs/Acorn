@php
    $customer = $invoice->client_name ?? optional($invoice->user)->name ?? 'Client';
    $invoiceNumber = $invoice->invoice_number ?? ('INV-' . str_pad($invoice->id, 4, '0', STR_PAD_LEFT));
    $amount = number_format($invoice->total_amount ?? 0, 2);
    $dueDate = $invoice->due_date ? $invoice->due_date->format('d M Y') : null;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Payment Link</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; background-color: #f9fafb; margin: 0; padding: 0;">
    <table role="presentation" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="padding: 24px;">
                <table role="presentation" cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(15, 23, 42, 0.1);">
                    <tr>
                        <td style="background-color: #133E87; color: #ffffff; padding: 24px 32px;">
                            <h1 style="margin: 0; font-size: 24px; font-weight: 600;">Invoice Payment</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 32px;">
                            <p style="font-size: 16px; color: #0f172a; margin-bottom: 16px;">
                                Hello {{ $customer }},
                            </p>
                            <p style="font-size: 15px; color: #334155; line-height: 1.6; margin-bottom: 16px;">
                                Thank you for choosing Acorn. We’ve prepared your invoice <strong>{{ $invoiceNumber }}</strong> for
                                KES <strong>{{ $amount }}</strong>.
                                @if ($dueDate)
                                    The payment is due by <strong>{{ $dueDate }}</strong>.
                                @endif
                            </p>
                            <p style="font-size: 15px; color: #334155; line-height: 1.6; margin-bottom: 24px;">
                                To complete your payment securely, please click the button below. You’ll be taken directly to the checkout page.
                            </p>
                            <p style="text-align: center; margin-bottom: 30px;">
                                <a href="{{ $paymentUrl }}" style="display: inline-block; padding: 14px 26px; background-color: #E3B04B; color: #0f172a; text-decoration: none; border-radius: 6px; font-size: 16px; font-weight: 600;">
                                    Pay Invoice Now
                                </a>
                            </p>
                            <p style="font-size: 14px; color: #64748b; line-height: 1.6; margin-bottom: 0;">
                                If the button above doesn’t work, copy and paste this link into your browser:<br>
                                <a href="{{ $paymentUrl }}" style="color: #2563eb;">{{ $paymentUrl }}</a>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #f1f5f9; padding: 20px 32px; text-align: center; color: #64748b; font-size: 12px;">
                            &copy; {{ now()->year }} Acorn. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

