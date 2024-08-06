<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Forgot password - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
    </title>
    <link href="{{ asset('css/tabler.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/demoapp.css') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1692870487"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark">

                    <img src="{{ asset('images/logo-terrazon.png') }}" width="110" height="32" alt="Tabler"
                        class="navbar-brand-image">
                </a>
            </div>
            <form class="card card-md" action="./" method="get" autocomplete="off" novalidate>
                <div class="card-body text-center">
                    <div class="mb-4">
                        <h2 class="card-title">Cuenta bloqueada</h2>
                        {{-- <p class="text-secondary">Please enter your password to unlock your account</p> --}}
                    </div>
                    <div class="mb-4">
                        <span class="avatar avatar-xl mb-3"
                            style="background-image: url('{{ asset('img/' . session('photo')) }}')"></span>
                        <h3>{{ session('name') }}</h3>
                    </div>
                    <form method="GET" action="{{ url('aunlock') }}">
                        <div class="mb-4">
                            <input type="password" name="code" class="form-control" placeholder="Code">
                        </div>
                        <button class="btn btn-primary w-100">OK</button>
                    </form>

                </div>
            </form>
        </div>
    </div>

</body>

</html>
