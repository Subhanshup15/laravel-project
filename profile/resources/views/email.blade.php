<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ ($recipient ?? null) ? 'Email to ' . $recipient : ($subject ?? 'Email') }}</title>
    <style>
        body {
            background-color: #f6f6f6;
            margin: 0;
            padding: 20px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .email-wrapper {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 6px;
            overflow: hidden;
        }

        .email-header {
            background: #e8e8e8ff;
            color: #ffffff;
            padding: 16px 20px;
        }

        .email-body {
            padding: 20px;
            color: #333333;
            font-size: 16px;
            line-height: 1.5;
        }

        .email-footer {
            padding: 12px 20px;
            font-size: 13px;
            color: #777777;
            background: #fafafa;
        }

        .btn {
            display: inline-block;
            background: #2b6cb0;
            color: #fff;
            padding: 10px 14px;
            border-radius: 4px;
            text-decoration: none;
        }

        .info-table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 6px 0;
        }

        .info-label {
            font-weight: bold;
            width: 120px;
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <div class="email-header">
            <span style="font-size:13px;">To: {{ $recipient ?? '' }}</span>
        </div>
        <div class="email-body">
            <h2 style="margin-top:0;">{{ $subject ?? 'Email' }}</h2>
            <table class="info-table">
                <tr>
                    <td class="info-label">Subject:</td>
                    <td>{{ $subject ?? '' }}</td>
                </tr>
                <tr>
                    <td class="info-label">Message:</td>
                    <td>{!! nl2br(e($msg ?? '')) !!}</td>
                </tr>
            </table>
        </div>
        <div class="email-footer">
            <p>Regards,<br>sagar</p>
        </div>
    </div>
</body>

</html>