<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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

        .login-container {
            background: rgba(255, 255, 255, 0.05);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 24px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            background: #1a1a1a;
            border: none;
            border-radius: 6px;
            color: #ffffff;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .message {
            margin-bottom: 15px;
            color: #f44336;
            text-align: center;
        }

        .success {
            color: #4CAF50;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
        }

        .register-link a {
            color: #00bfff;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        @if ($errors->any())
            <div class="message">{{ $errors->first() }}</div>
        @endif

        @if (session('success'))
            <div class="message success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <div class="register-link">
            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a></p>
        </div>
    </div>
</body>
</html>
