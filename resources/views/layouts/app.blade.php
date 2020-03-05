<html>
    <head>
        <meta charset="UTF-8">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <title>App | @yield('title')</title>

        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}"/>

        <style>
            .navbar {
                margin-bottom: 5%;
            }
        </style>

        @yield('styles')
    </head>
    <body>
        <nav class="navbar navbar-dark bg-primary">
            <a class="navbar-brand" href="/clientes">Clientes</a>
        </nav>

        <div class="container">
            @yield('content')
        </div>

        <script src="{{mix('js/app.js')}}" type="text/javascript">

        @yield('scripts')
    </body>
</html>
