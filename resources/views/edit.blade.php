<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Reserva</title>
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

        .form-container {
            width: 600px;
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.8);
        }
    </style>
</head>

<body>
    @include('layouts.navbar')

    <div class="container">
        <div class="form-container">
            <h1>Editar Reserva</h1>
            <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $reservation->nombre }}" required>
                </div>

                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni" value="{{ $reservation->dni }}" required>
                </div>

                <div class="mb-3">
                    <label for="fecha_entrada" class="form-label">Fecha de entrada</label>
                    <input type="date" class="form-control" id="fecha_entrada" name="fecha_entrada" value="{{ $reservation->fecha_entrada }}" required>
                </div>

                <div class="mb-3">
                    <label for="fecha_salida" class="form-label">Fecha de salida</label>
                    <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" value="{{ $reservation->fecha_salida }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </div>
    </div>
</body>

</html>
