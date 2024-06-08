<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <style>
        body {
            font-family: 'figtree', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('/images/imagenHotel.jpg');
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 92vh;
        }

        .pageInfo {
            width: 900px;
            height: 550px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .box {
            width: calc(50% - 20px);
            height: calc(100% + 35px);
            background-color: white;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
        }

        #box1 {
            font-family: Courier, "Lucida Console", monospace;
        }

        #box2 {
            font-family: Courier, "Lucida Console", monospace;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="tel"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')
    <div class="container">
        <form action="/reservas" method="POST">
            @csrf
            <div class="pageInfo">
                <div class="box" id="box1">
                    <h2>Formulario de Reserva</h2>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <label for="dni">DNI:</label>
                    <input type="text" id="dni" name="dni" required>
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion">
                    <label for="poblacion">Población:</label>
                    <input type="text" id="poblacion" name="poblacion">
                    <label for="fecha_entrada">Fecha de Entrada:</label>
                    <input type="text" id="fecha_entrada" name="fecha_entrada" required>
                    <label for="fecha_salida">Fecha de Salida:</label>
                    <input type="text" id="fecha_salida" name="fecha_salida" required>
                </div>
                <div class="box" id="box2">
                    <label for="telefono">Número de Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" required>
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" required>
                    <label for="num_huespedes">Número de Huéspedes:</label>
                    <input type="number" id="num_huespedes" name="num_huespedes" required>
                    <label for="num_ninos">Número de Niños:</label>
                    <input type="number" id="num_ninos" name="num_ninos"><br><br><br>
                    <input type="submit" value="Enviar">
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#fecha_entrada", {
            enableTime: false,
            dateFormat: "Y-m-d",
            minDate: "today",
        });
        flatpickr("#fecha_salida", {
            enableTime: false,
            dateFormat: "Y-m-d",
            minDate: "today",
        });
    </script>
</body>

</html>
