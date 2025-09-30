<x-platform title="Home">

    @section('content')
    <div class="container-fluid mt-4">
        <div class="d-flex flex-column justify-content-center align-items-center vh-100 bg-light text-center mt-4">
            <!-- Logo -->
            <img src="{{ Vite::asset('resources/images/agence-logo.png') }}" alt="Logo"
                class="img-fluid d-block mx-auto mb-4">

            <!-- Slogan -->
            <h1 class="fw-bold text-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                Tu empresa, nuestro compromiso
            </h1>
            <p class="text-muted fs-5" style="font-family: 'Georgia', serif;">
                Innovación y confianza en cada proyecto
            </p>
        </div>
    </div>

</x-platform>
