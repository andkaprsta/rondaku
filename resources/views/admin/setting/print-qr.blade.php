<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>QR Pos Ronda</title>

    <script>
        window.onload = function() {

            window.print();

        }
    </script>

    <style>
        body {

            margin: 0;

            display: flex;

            justify-content: center;

            align-items: center;

            height: 100vh;

            font-family: Arial;

        }

        .card {

            text-align: center;

        }
    </style>

</head>

<body>

    <div class="card">

        <h1>QR POS RONDA</h1>

        {!! QrCode::size(500)
        ->margin(1)
        ->generate(route('petugas.absensi.qr',$setting->qr_token)) !!}

        <p>Scan QR untuk melakukan absensi ronda</p>

    </div>

</body>

</html>