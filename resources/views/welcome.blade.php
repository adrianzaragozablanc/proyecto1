<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
            height: calc(50% - 20px);
            background-color: white;
        }

        #box1 {
            background-image: url('images/recepcion.jpg');
            background-size: 100% 100%;
        }

        #box4 {
            background-image: url('images/cafeteria.jpg');
            background-size: 100% 100%;
        }

        #box2 {
            font-family: Courier, "Lucida Console", monospace;
        }

        #box3 {
            font-family: Courier, "Lucida Console", monospace;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')
    <div class="container">
        <div class="pageInfo">
            <div class="box" id="box1"></div>
            <div class="box" id="box2">
                <h1>DATOS DE CONTACTO</h1><br>
                <h4>Telefono: 111 11 11 11</h4><br>
                <h4>Email: Hotel@hotel.com</h4><br>
                <i class="fab fa-instagram fa-3x"></i>
                <i class="fab fa-facebook fa-3x"></i>
                <i class="fab fa-twitter fa-3x"></i>
            </div>
            <div class="box" id="box3">
                <h1>QUIENES SOMOS</h1><br>
                <p>Durante los ultimos 50 años nos hemos esforzado por ofrecer una experiencia excepcional a cada uno de
                    nuestros huéspedes. Nuestro hotel es el lugar
                    perfecto para tu próxima escapada.

                    Nuestras habitaciones y suites están diseñadas para brindar comodidad y elegancia.
                </p>
            </div>
            <div class="box" id="box4"></div>
        </div>
    </div>
</body>

</html>