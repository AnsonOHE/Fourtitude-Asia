<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link type="text/css" href="{{ mix('css/app.css') }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </head>
    <body class="bg-slate-900 h-screen">
        <div class="container p-4">
            @yield('content')
        </div>

	    <script type="text/javascript" src="{{ mix('js/app.js') }}" defer></script>
        @yield('js')
    </body>
</html>
