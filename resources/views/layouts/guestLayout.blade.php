<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', env('APP_NAME', 'Chatapp'))</title>
    <!-- Styles -->
</head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    {{ strtoupper(env('APP_NAME', 'Czatap')) }}
                </div>
            </div>
        </div>
        <div class="container-lg">
            @yield('content')
        </div>
        <div class="footer">
            <p>© 2023 Kamil Langer IT. Wszelkie prawa zastrzeżone.</p>
        </div>
    </body>
</html>
