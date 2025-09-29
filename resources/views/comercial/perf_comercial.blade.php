<x-platform title="Comercial" class="container-fluid">


    {{-- <div class="container bg-primary"> --}}
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Comercial</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Performance Comercial</li>
                    </ol>
                </nav>
            </div>
            <div class="card-body">
                <div class="accordion shadow" id="accordionPanelsStayOpenExample">
                    <!-- Filtro de Datos -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-info" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne">
                                Consultores
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="row m-2 p-4">
                                    <div class="col-12 col-md-2 d-flex justify-content-center m-2">
                                        <strong>Período</strong>
                                    </div>
                                    <div class="col-12 col-md-9 d-flex justify-content-left ">
                                        {{-- <label for="meses">Meses:</label> --}}
                                        <select id="meses" class="form-select form-select-sm"
                                            aria-label=".form-select-sm example">
                                            @for ($i = 1; $i <= 12; $i++) <option value="{{ $i }}">{{ nombreMes($i) }}
                                                </option>
                                                @endfor
                                        </select>
                                        {{-- <label for="anios">Años:</label> --}}
                                        <select id="anios" class="form-select form-select-sm"
                                            aria-label=".form-select-sm example">
                                            @for ($anio = 2003; $anio <= 2008; $anio++) <option value=" {{ $anio }}">
                                                {{ $anio }}</option>
                                                @endfor
                                        </select>

                                        <h4 style="margin-left: 25px; margin-right: 25px;" class="m-2">A</h4>
                                        </p>
                                        {{--  <label for="meses2">Meses:</label> --}}
                                        <select id="meses2" class="form-select form-select-sm"
                                            aria-label=".form-select-sm example">
                                            @for ($i = 1; $i <= 12; $i++) <option value="{{ $i }}">{{ nombreMes($i) }}
                                                </option>
                                                @endfor
                                        </select>
                                        {{--  <label for="anios2">Años:</label> --}}
                                        <select id="anios2" class="form-select form-select-sm"
                                            aria-label=".form-select-sm example">
                                            @for ($anio2 = 2003; $anio2 <= 2008; $anio2++) <option value="{{ $anio2 }}">
                                                {{ $anio2 }}
                                                </option>
                                                @endfor
                                        </select>
                                    </div>
                                </div>


                                <div class=" class=" container mt-3">
                                    <div class="row text-center text-md-start">
                                        <div
                                            class="col-12 col-lg-2 d-flex justify-content-center justify-content-md-center align-items-center mb-2 mb-md-0">
                                            <p class=" title-consd"><strong>Consultores</strong></p>

                                        </div>

                                        <!-- Select Interactivo -->
                                        <div class="col-12 col-lg-8 col-xl-8">
                                            <div class=" p-4  justify-content-center shadow">
                                                <form id="demoform" action="#" method="POST">
                                                    @csrf

                                                    <select multiple="multiple" size="6"
                                                        name="duallistbox_permissions[]" id="test">
                                                        @foreach ($consults as $consult)
                                                        <option value={{ $consult->co_usuario }}>
                                                            {{ $consult->no_usuario }}
                                                        </option>
                                                        @endforeach
                                                    </select>

                                                </form>
                                            </div>

                                        </div>
                                        <div
                                            class="col-12 col-lg-2 d-flex justify-content-center justify-content-lg-end align-items-center mt-3 mt-lg-0">
                                            <div
                                                class="d-flex flex-row flex-lg-column gap-2 justify-content-center align-items-center">
                                                <!-- Botón Relatório -->
                                                <button type="button" class="btn btn-primary btn-sm btn-fixed"
                                                    id="tabla">
                                                    <i class="bi bi-list-ul me-1"></i> Relatório
                                                </button>

                                                <!-- Gráfico de Barras -->
                                                <button type="button" class="btn btn-primary btn-sm btn-fixed"
                                                    id="g-bar">
                                                    <i class="bi bi-bar-chart-line me-1"></i> Gráfico
                                                </button>

                                                <!-- Gráfico de Pizza -->
                                                <button type="button" class="btn btn-primary btn-sm btn-fixed"
                                                    id="g-area">
                                                    <i class="bi bi-pie-chart me-1"></i> Pizza
                                                </button>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Acordión de Datos -->
            <div class="accordion mt-4 shadow" id="accordionExample">

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed bg-info" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseTwo">
                            Panel de Datos
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <div class="datos row m-3">
                                <div class="tabla-datos" id="tabla-datos">
                                </div>

                                <div class="contenedor-html">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0  "></script>
    <script>

    </script>

</x-platform>
