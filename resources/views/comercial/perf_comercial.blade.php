<x-platform title="Comercial">


    {{-- <div class="container bg-primary"> --}}
    <div class="card">
        <div class="card-header">
            Consultores
        </div>
        <div class="card-body">
            <div class="row m-2">
                <div class="col-1  d-flex justify-content-center p-1">Período</div>
                <div class="col-7  d-flex justify-content-left p-1">
                    {{-- <label for="meses">Meses:</label> --}}
                    <select id="meses" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ nombreMes($i) }}</option>
                        @endfor
                    </select>
                    {{-- <label for="anios">Años:</label> --}}
                    <select id="anios"class="form-select form-select-sm" aria-label=".form-select-sm example"">
                        @for ($anio = 2003; $anio <= 2008; $anio++)
                            <option value="{{ $anio }}">{{ $anio }}</option>
                        @endfor
                    </select>
                    <p> A </p>
                    {{--  <label for="meses2">Meses:</label> --}}
                    <select id="meses2" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ nombreMes($i) }}</option>
                        @endfor
                    </select>
                    {{--  <label for="anios2">Años:</label> --}}
                    <select id="anios2" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        @for ($anio2 = 2003; $anio2 <= 2008; $anio2++)
                            <option value="{{ $anio2 }}">{{ $anio2 }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col md-2  d-flex justify-content-center p-1"></div>
            </div>

            <div class="row m-2  d-flex justify-content-center p-3">
                <div class="col-1 d-flex align-self-center">
                    <p class="text-break">Consultores</p>
                </div>
                <div class="col-9    justify-content-center">
                    <form id="demoform" action="#" method="POST">
                        @csrf

                        <select multiple="multiple" size="6" name="duallistbox_permissions[]" id="test">
                            @foreach ($consults as $consult)
                                <option value={{ $consult->co_usuario }}>{{ $consult->no_usuario }}</option>
                            @endforeach
                        </select>

                    </form>
                </div>
                <div class="col-2  d-flex ">
                    <div class="buttons align-self-center">
                        <div class="col-md-4">
                            <div class="btn-group-vertical">
                                <input type="button" class="btn btn-primary btn-sm btn-block mb-1" value="Relatório"
                                    id="tabla" />
                                <input type="button" class="btn btn-primary btn-sm btn-block" value="Gráfico"
                                    id="g-bar" />
                                <input type="button" class="btn btn-primary btn-sm btn-block mt-1" value="Pizza"
                                    id="g-area" />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="datos row m-3">
        <div class="tabla-datos" id="tabla-datos">


        </div>
        <div class="contenedor-html">

        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0  "></script>

</x-platform>
