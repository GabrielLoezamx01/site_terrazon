<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
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
            display: block;
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
            <img src="https://example.com/logo.png" alt="Terrazon Logo">
            <h1 class="fw-bold">¡Bienvenido a Terrazon!</h1>
        </div>

        <div class="email-body">
            <h2>¡Registro Exitoso!</h2>
            <p>Gracias por unirte a nuestra comunidad. Tu token de verificación está listo:</p>
            <p>Por favor, sigue el enlace a continuación para continuar:</p>
            <a href="{{ env('URL_REFERRALS') . $token }}" class="button">Click Aquí Para Continuar</a>
            <p>Si tienes alguna pregunta o necesitas ayuda, no dudes en contactarnos.</p>
            <p>¡Estamos aquí para ti!</p>
        </div>

        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Terrazon. Todos los derechos reservados.</p>
            <p><a href="https://terrazon.com/terms">Términos y Condiciones</a> | <a
                    href="https://terrazon.com/privacy">Política de Privacidad</a></p>
        </div>
    </div>
</body>

</html>
