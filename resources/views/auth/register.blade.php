<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
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

        .register-container {
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

        input[type="text"],
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

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #00bfff;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>

        @if ($errors->any())
            <div class="message">
                @foreach ($errors->all() as $err)
                    <p>{{ $err }}</p>
                @endforeach
            </div>
        @endif

        @if (session('success'))
            <div class="message success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            <button type="submit">Daftar</button>
        </form>

        <div class="login-link">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>
</body>
</html>
