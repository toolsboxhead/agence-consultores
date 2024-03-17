<header>
    {{--  <nav class="navbar navbar-expand-lg bg-body-tertiary"> --}}
    <nav class ="navbar navbar-expand-md navbar-dark bg-dark" data-bs-theme="dark" aria-label="Fourth navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('main') }}">
                <img src="{{ asset('storage/images/logo/agence-logo.png') }}" alt="Agence" width="80" height="35">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Agence</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Projetos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Administrativo</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Comercial
                        </a>
                        <ul class="dropdown-menu " aria-labelledby="dropdownMenuButtonLight">
                            <li><a class="dropdown-item" href="{{ route('comercial.perfcomercial') }}">Performance
                                    Comercial</a></li>
                            <li><a class="dropdown-item" href=" {{ route('comercial1.datosview') }} ">Pruebas SP</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Financeiro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Usuário</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sair</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>
