<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .email-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin: 0 auto;
        }

        .email-header,
        .email-footer {
            text-align: center;
            margin-bottom: 20px;
        }

        .email-footer {
            font-size: 0.875rem;
            color: #6c757d;
        }

        .email-body {
            font-size: 1rem;
            line-height: 1.5;
            color: #212529;
        }

        .token {
            display: block;
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 10px;
            color: #007bff;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            color: #ffffff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container email-container mt-5 mb-5">
        <div class="email-header">
            <h1 class="fw-bold">¡Bienvenido a Terrazon!</h1>
        </div>

        <div class="email-body">
            <h2>¡Registro Exitoso!</h2>
            <p>Gracias por registrarte. Aquí está tu token de verificación:</p>
            <span class="token">{{ $token }}</span>
            <p>Si tienes alguna pregunta o necesitas asistencia, no dudes en ponerte en contacto con nuestro equipo de soporte.</p>
            <p>¡Gracias por unirte a nosotros!</p>
            <!-- Puedes añadir un botón si es necesario -->
        </div>

        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Terrazon. Todos los derechos reservados.</p>
        </div>
    </div>
</body>

</html>
