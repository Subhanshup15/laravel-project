<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ old('to') ? 'Send Email - ' . old('to') : 'Send Email' }}</title>
    <style>
        body {
            background-color: #f6f6f6;
            margin: 0;
            padding: 40px 0;
            font-family: 'Segoe UI', Arial, Helvetica, sans-serif;
        }

        .email-wrapper {
            max-width: 420px;
            margin: 0 auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 24px rgba(44, 62, 80, 0.08);
            overflow: hidden;
        }

        .email-header {
            background: #2b6cb0;
            color: #fff;
            padding: 24px 32px;
            font-size: 1.3rem;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .email-body {
            padding: 32px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #2b6cb0;
        }

        input[type="email"],
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #e2e8f0;
            border-radius: 5px;
            font-size: 1rem;
            background: #f9fafb;
            transition: border-color 0.2s;
        }

        input:focus,
        textarea:focus {
            border-color: #2b6cb0;
            outline: none;
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        .btn {
            display: inline-block;
            background: #2b6cb0;
            color: #fff;
            padding: 12px 28px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn:hover {
            background: #234e8c;
        }

        .email-footer {
            padding: 16px 32px;
            font-size: 13px;
            color: #777;
            background: #fafafa;
            text-align: center;
        }

        .alert {
            margin: 0 0 18px 0;
            padding: 12px 18px;
            border-radius: 5px;
            background: #e6fffa;
            color: #2c7a7b;
            border: 1px solid #b2f5ea;
            font-size: 1rem;
        }

        .alert-error {
            background: #fff5f5;
            color: #c53030;
            border: 1px solid #feb2b2;
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <div class="email-header">
            {{ old('to') ? 'Send Email to ' . old('to') : 'Send Email' }}
        </div>
        <div class="email-body">
            @if($errors->any())
            <div class="alert alert-error">
                <strong>Please fix the following errors:</strong>
                <ul style="margin:8px 0 0 16px;">
                    @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
            @endif
            <form action="{{ route('send.email') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="to">To:</label>
                    <input type="email" name="to" id="to" value="{{ old('to') }}" required autofocus>
                    @error('to')
                    <div class="alert alert-error" style="margin-top:8px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required>
                    @error('subject')
                    <div class="alert alert-error" style="margin-top:8px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea name="message" id="message" required>{{ old('message') }}</textarea>
                    @error('message')
                    <div class="alert alert-error" style="margin-top:8px">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn">Send Email</button>
            </form>
        </div>
        <div class="email-footer">
            &copy; {{ date('Y') }} Your Company. All rights reserved.
        </div>
    </div>
</body>

</html>