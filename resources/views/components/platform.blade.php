<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="_token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/scss/app.scss', 'resources/js/app.js', 'resources/js/mijs.js', 'resources/scss/miestilo.css', 'resources/js/acquisitions.js'])

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-duallistbox@3.0.6/dist/jquery.bootstrap-duallistbox.min.js">
    </script>


    @yield('styles')


    <title>
        Consultores - {{ $title ?? '' }}
    </title>
</head>

<body>
    <x-menu />
    <main>

        {{ $slot }}

    </main>

    @yield('scripts')

</body>

</html>
