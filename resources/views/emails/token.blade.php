<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Cuenta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Arial', sans-serif;
        }

        .email-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            margin: 20px auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .email-header img {
            max-width: 150px;
            margin-bottom: 20px;
        }

        .email-body {
            font-size: 1rem;
            line-height: 1.6;
            color: #333333;
            margin-bottom: 30px;
        }

        .email-body h2 {
            color: #37B052;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .token {
            display: block;
            font-size: 1.5rem;
            font-weight: bold;
            margin: 20px 0;
            color: #37B052;
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 12px 25px;
            font-size: 1rem;
            font-weight: bold;
            color: #ffffff;
            background-color: #37B052;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            margin: 20px auto;
        }

        .email-footer {
            font-size: 0.875rem;
            color: #6c757d;
            text-align: center;
        }

        .email-footer p {
            margin-bottom: 5px;
        }

        .email-footer a {
            color: #37B052;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container email-container">
        <div class="email-header">
            <img src="https://terrazon.mx/images/logo-terrazon.png" alt="Logo de Terrazon">
            <h1 class="fw-bold">Recuperación de Cuenta</h1>
        </div>

        <div class="email-body">
            <h2>Tu código de recuperación es:</h2>
            <span class="token">{{ $token }}</span>
            <p>Si no solicitaste este código, hacer caso omiso a este mensaje.</p>
            <p>Gracias por confiar en Terrazon.</p>
            <a href="{{ route('custom.password') }}" class="button">Recuperar Cuenta</a>
        </div>
</body>
</html>
