<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{{ csrf_token() }}, width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    {{-- Archivos de Vite --}}
    @vite([
    'resources/scss/app.scss',
    'resources/js/app.js',
    'resources/js/mijs.js',
    'resources/scss/miestilo.css'
    ])

    {{-- jQuery y plugins --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-duallistbox@3.0.6/dist/jquery.bootstrap-duallistbox.min.js">
    </script>

    @yield('styles')

    <title>Consultores - {{ $title ?? '' }}</title>
</head>

<body class="d-flex flex-column min-vh-100">
    {{-- Navbar --}}
    <x-menu />

    {{-- Contenido principal --}}
    <main class="flex-fill">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <x-footer />



    @yield('scripts')

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
