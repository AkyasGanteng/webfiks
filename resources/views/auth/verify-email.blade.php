<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #0d0d0d;
            color: #ffffff;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .verify-container {
            background: rgba(255, 255, 255, 0.05);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 24px;
        }

        p {
            margin: 10px 0 20px;
        }

        .message {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #2196F3;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #1e88e5;
        }

        form {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="verify-container">
        <h2>Verifikasi Email</h2>
        <p>Cek email kamu dan klik link verifikasi untuk mengaktifkan akun.</p>

        @if (session('message'))
            <div class="message">{{ session('message') }}</div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit">Kirim Ulang Email Verifikasi</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background-color: #f44336;">Logout</button>
        </form>
    </div>
</body>
</html>
