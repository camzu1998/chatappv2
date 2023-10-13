<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', env('APP_NAME', 'Chatapp'))</title>
        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="container-fluid header" style="height: 100px">
            <div class="row justify-content-center d-flex align-items-center h-100">
                <div class="col-12 text-center">
                    {{ strtoupper(env('APP_NAME', 'Czatap')) }}
                </div>
            </div>
        </div>
        <div class="container-lg d-flex align-items-center justify-content-center my-auto" style="height: calc(100vh - 150px)">
            @yield('content')
        </div>
        <div class="container-fluid" style="height: 50px">
            <div class="row footer text-center justify-content-center d-flex align-items-center my-auto h-100">
                <div class="col-12 text-center">
                    © 2023 Kamil Langer IT. Wszelkie prawa zastrzeżone.
                </div>
            </div>
        </div>
    </body>
</html>
