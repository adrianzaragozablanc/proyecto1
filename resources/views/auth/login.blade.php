<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7fafc;
            margin: 0;
            padding: 0;
            background-image: url('/images/imagenHotel.jpg');
        }

        .container {
            background-color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            width: 100%;
            max-width: 400px;
            margin: auto;
            margin-top: 20px;
            /* Ajusta el margen superior */
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #cbd5e0;
            border-radius: 0.25rem;
        }

        .form-group .remember-me {
            display: flex;
            align-items: center;
        }

        .form-group .remember-me input {
            margin-right: 0.5rem;
        }

        .form-group .remember-me span {
            color: #4a5568;
        }

        .form-group .forgot-password {
            text-align: right;
            margin-bottom: 1rem;
        }

        .form-group .forgot-password a {
            color: #4a5568;
            text-decoration: none;
        }

        .form-group .forgot-password a:hover {
            color: #2d3748;
        }

        .form-group button {
            width: 100%;
            padding: 0.5rem;
            border: none;
            border-radius: 0.25rem;
            background-color: #4a5568;
            color: white;
            font-size: 1rem;
        }

        .form-group button:hover {
            background-color: #2d3748;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div class="form-group remember-me">
                <input id="remember_me" type="checkbox" name="remember">
                <span>Remember me</span>
            </div>

            <div class="form-group forgot-password">
                <a href="{{ route('password.request') }}">Forgot your password?</a>
            </div>

            <div class="form-group">
                <button type="submit">Log in</button>
            </div>
        </form>
    </div>
</body>

</html>