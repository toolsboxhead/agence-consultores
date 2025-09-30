<header>

    <nav id="nav" class="nav-web">
        <div class="container-nav-web">
            <div class="logo-nav ">
                <a href="/">
                    <h1><img src="{{ Vite::asset('resources/images/logo.gif') }}" alt="Logo" class="img-fluid d-block "
                            style="max-width: 80px;"></h1>
                </a>
            </div>

            <div id="nav-web-menu" class="nav-web-menu">
                <ul class="opc-menu" id="menu">
                    <div class="close-icon">
                        <a href="#" class="aclose"><i class="bi bi-x-square"></i></a>
                    </div>
                    <li>
                        <a href="#">Projetos</a>
                    </li>
                    <li>
                        <a href="#">Administrativo</a>
                    </li>
                    <li>
                        <a href="#" class="dropdown__link">Comercial
                            <!-- <div class="toggle"><span></span></div> -->
                            <input type="checkbox">
                            <i class="bi bi-chevron-down"></i>
                        </a>

                        <div class="content-sub">
                            <ul class="submenu">
                                <li><a href='#'> Opcion1</a></li>
                                <li><a href="{{ route('comercial.perfcomercial') }}"> Performance Comercial </a></li>
                                <li><a href='#'> Opcion3</a></li>
                                <!-- <hr> -->
                                <li><a href='#'> Opcion4</a></li>
                                <li><a href='#'> Opcion5</a></li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#">Financeiro</a>
                    </li>
                    <li>
                        <a href="#">Usuario</a>
                    </li>
                </ul>
            </div>
            <a href="#menu" class="nav__menu">
                <h1><i class="bi bi-list"></i></h1>
            </a>
        </div>
    </nav>
</header>
