<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Farmácia</title>
        
       <link href="{{ url(mix('site/css/style.css')) }}" rel="stylesheet" type="text/css">


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    </head>
    <body>

        <div id="app">

            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>


                    </div>
                </div>
            </nav>


            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <script src="{{ asset('bootstrap/template/_js/jquery.js')}}"></script>
        <script src="{{ asset('bootstrap/template/_js/chart.js')}}"></script>
        <script src="{{ asset('bootstrap/template/_js/bootstrap.js')}}"></script>
        <script src="{{ asset('bootstrap/template/_js/bootstrap.bundle.js')}}"></script>  
        <script src="{{ asset('bootstrap/template/_js/jquery-easing.js')}}"></script>  
    </body>
</html>
