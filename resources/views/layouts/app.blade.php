<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplicación Laravel')</title>
   <link href="{{ mix('css/app.css') }}" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Aquí puedes agregar otros enlaces a CSS o scripts JS -->
</head>
<body>
    <header>
        <!-- Barra de navegación, si la necesitas -->
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Pie de página, si lo deseas -->
    </footer>

    <script src="{{ mix('js/app.js') }}"></script>
    <!-- Aquí puedes agregar otros scripts JS al final del cuerpo -->
</body>
</html>
