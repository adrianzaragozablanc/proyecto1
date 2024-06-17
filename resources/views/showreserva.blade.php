<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mis Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'figtree', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('/images/imagenHotel.jpg');
            background-size: cover;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 92vh;
        }

        .pageInfo {
            width: 900px;
            height: auto;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')

    <div class="container">
        <div class="pageInfo">
            <h1>Mis Reservas</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @auth
                @if(!$reservations->isEmpty())
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>DNI</th>
                                <th>Fecha de entrada</th>
                                <th>Fecha de salida</th>
                                <th>Num_huespedes</th>
                                <th>Num_niños</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->nombre }}</td>
                                    <td>{{ $reservation->dni }}</td>
                                    <td>{{ $reservation->fecha_entrada }}</td>
                                    <td>{{ $reservation->fecha_salida }}</td>
                                    <td>{{ $reservation->num_huespedes }}</td>
                                    <td>{{ $reservation->num_ninos }}</td>
                                    <td>
                                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                        <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-primary btn-sm">Modificar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No tienes reservas actualmente.</p>
                @endif
            @else
                <a href="{{ route('login') }}"></a>
            @endauth
        </div>
    </div>
</body>

</html>
