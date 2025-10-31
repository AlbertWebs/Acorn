<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
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
            border-bottom: 3px solid #16a34a;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #16a34a;
            margin: 0;
            font-size: 24px;
        }
        .content {
            margin: 20px 0;
        }
        .message-box {
            background-color: #f9fafb;
            border-left: 4px solid #16a34a;
            padding: 20px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .message-box pre {
            white-space: pre-wrap;
            word-wrap: break-word;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .info-section {
            background-color: #f9fafb;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
            border: 1px solid #e5e7eb;
        }
        .info-row {
            padding: 8px 0;
            border-bottom: 1px solid #e5e7eb;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: 600;
            color: #666;
            display: inline-block;
            width: 120px;
        }
        .info-value {
            color: #333;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            color: #666;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $subject }}</h1>
        </div>

        <div class="content">
            @if(isset($fromName) && $fromName)
            <div class="info-section">
                <div class="info-row">
                    <span class="info-label">From:</span>
                    <span class="info-value">{{ $fromName }}</span>
                </div>
                @if(isset($fromEmail) && $fromEmail)
                <div class="info-row">
                    <span class="info-label">Email:</span>
                    <span class="info-value">{{ $fromEmail }}</span>
                </div>
                @endif
                <div class="info-row">
                    <span class="info-label">Date:</span>
                    <span class="info-value">{{ now()->format('d M Y, h:i A') }}</span>
                </div>
            </div>
            @endif

            <div class="message-box">
                <pre>{{ $messageContent }}</pre>
            </div>
        </div>

        <div class="footer">
            <p>This message was sent from Acorn Special Tutorials notification system.</p>
            <p>&copy; {{ date('Y') }} Acorn Special Tutorials. All rights reserved.</p>
        </div>
    </div>
</body>
</html>

