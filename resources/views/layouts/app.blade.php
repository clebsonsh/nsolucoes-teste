<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if (View::hasSection('title'))
            {{ config('app.name', 'Laravel') }} | @yield('title')
        @else
            {{ config('app.name', 'Laravel') }}
        @endif
    </title>

    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .icon {
            height: 24px;
        }
    </style>

    <!-- Scripts -->
    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <!-- Vite CSS e JavaScript -->
    @vite(['resources/js/app.js'])

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="{ route('home.index') }}">N SOLUÇÕES - TESTE BACK 2022</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a @class(['nav-link', 'active' => request()->routeIs('home.index')]) href="{{ route('home.index') }}">Home</a>
                    @auth
                        <a @class(['nav-link', 'active' => request()->routeIs('users.index')]) href="{{ route('users.index') }}">Lista de Usuários</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
</body>

</html>
