<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Terrazon LOCK</title>
    <style>
        .email-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin: 0 auto;
        }
        .email-header, .email-body, .email-footer {
            padding: 15px;
            text-align: center;
        }
        .email-header {
            background-color: #007bff;
            color: #ffffff;
            border-radius: 8px 8px 0 0;
        }
        .email-footer {
            background-color: #e9ecef;
            color: #495057;
            border-radius: 0 0 8px 8px;
        }
        .code {
            font-size: 1.25rem;
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container email-container">
        <div class="email-header">
            <h1>Terrazon LOCK</h1>
        </div>
        <div class="email-body">
            <p class="fw-bold">Hola, {{ $token['name'] }}</p>
            <p>Gracias por tu solicitud. Aquí tienes el código necesario para desbloquear el acceso:</p>
            <p class="code">{{ $token['token'] }}</p>
        </div>
        <div class="email-footer">
            <p>Si necesitas ayuda adicional o tienes alguna pregunta, no dudes en contactarnos.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
