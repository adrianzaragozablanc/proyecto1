<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7fafc;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #007bff;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
            margin-right: 20px;
        }

        .container {
            background-color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            width: 100%;
            max-width: 400px;
            margin: auto;
            margin-top: 20px; /* Ajusta el margen superior */
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
    <div class="navbar">
        <div>
            <a href="/">Inicio</a>
            <a href="/about">Acerca de</a>
            <a href="/contact">Contacto</a>
        </div>
        <div>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
    <div class="content">
        <div class="container">
            <!-- Validation Errors -->
            <div class="error">
                <!-- Aquí puedes mostrar los errores de validación -->
                <!-- Ejemplo: <p>Error message</p> -->
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" required autofocus>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required>
                </div>

                <div class="form-group forgot-password">
                    <a href="{{ route('login') }}">Already registered?</a>
                </div>

                <div class="form-group">
                    <button type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
