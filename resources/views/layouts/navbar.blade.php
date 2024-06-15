<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav style="background-color: #007bff; padding: 10px; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <a href="/" style="color: white; text-decoration: none; font-size: 1.5rem; margin-right: 450px; margin-left: 20px;">Inicio</a>
            <a href="/reserva" style="color: white; text-decoration: none; font-size: 1.5rem; margin-right: 250px;">Reservar</a>
            @auth
                <a href="/showreserva" style="color: white; text-decoration: none; font-size: 1.5rem; margin-right: 250px;">Mis reservas</a>
                @if(Auth::user()->hasRole('admin'))
                    <a href="{{ route('admin.roles.edit') }}" style="color: white; text-decoration: none; font-size: 1.5rem; margin-right: 20px;">Administrar Roles</a>
                @endif
            @endauth
        </div>
        <div>
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: white; text-decoration: none; font-size: 1.5rem;">Cerrar Sesión</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" style="color: white; text-decoration: none; font-size: 1.5rem; margin-right: 20px;">Iniciar Sesion</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" style="color: white; text-decoration: none; font-size: 1.5rem;">Registrarse</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>
</body>

</html>
