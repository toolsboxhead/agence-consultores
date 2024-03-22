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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
        integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

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
