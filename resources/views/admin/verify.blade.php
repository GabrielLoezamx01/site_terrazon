<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verificar Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .center-screen {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Ocupa toda la altura de la ventana */
        }
    </style>
</head>

<body>
    <div class="container center-screen">
        <div class="row">
            <div class="col card text-center">
                <div class="card-body p-5 text-start">
                    <h1 class="fw-bold">Validación de Usuario</h1>
                    <div class="mb-3">
                        <label for="Usuario" class="fs-4"> <b>Usuario: </b>
                            <span>{{ $Referrals->name }}</span></label>
                    </div>
                    <div class="mb-3">
                        <form action="">
                            <div class="mb-3">
                                <label for="Usuario" class="fs-4 fw-bold">Contraseña</label>
                                <input type="text" class="input-terrazon" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="Usuario" class="fs-4 fw-bold">Verificar Contraseña</label>
                                <input type="text" class="input-terrazon" name="password2">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-dark">Continuar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


</body>

</html>
