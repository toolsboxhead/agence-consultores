<x-platform title="Comercial">

    <h1>Comercial</h1>
    <div class="container-lg bg-primary">
        <div class="col tab bg-danger">
            <h1>TABULADORES</h1>
        </div>
        <div class="col-md consult">
            <h1>SELECT</h1>
            <div class="row m-2 filtros ">
                <div class="col">
                    <div>
                        <label for="meses">Meses:</label>
                        <select id="meses" onchange="guardarMesSeleccionado()">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ nombreMes($i) }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="annios">
                        <label for="anios">Años:</label>
                        <select id="anios" onchange="guardarAnioSeleccionado()">
                            @for ($anio = 2003; $anio <= 2008; $anio++)
                                <option value="{{ $anio }}">{{ $anio }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div>
                        <label for="meses2">Meses:</label>
                        <select id="meses2">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ nombreMes($i) }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="annios2">
                        <label for="anios2">Años:</label>
                        <select id="anios2">
                            @for ($anio2 = 2003; $anio2 <= 2008; $anio2++)
                                <option value="{{ $anio2 }}">{{ $anio2 }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>

            <form id="demoform" action="#" method="POST">
                @csrf
                <div class="col-sm-8">
                    <select multiple="multiple" size="6" name="duallistbox_permissions[]" id="test">
                        @foreach ($consults as $consult)
                            <option value={{ $consult->co_usuario }}>{{ $consult->no_usuario }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="button" value="add toto" id="toto" />
                <input type="button" value="refresh toto" id="tototo" />
                <input type="button" value="test" id="tata"></button>
                <input type="button" value="Array" id="array"></button>
                <button class="btn btn-success">Clickeame Me</button>
            </form>

        </div>

    </div>
    <div class="container-lg bs-primary">
        <h1>Acumulado por Mes</h1>
        {{-- {{ method_field('POST') }} --}}
        <form action="{{ route('comercial.datos_performance') }}" method="POST">

            @csrf
            <label for="prefijo">Código de Prefijo:</label>
            <input type="text" name="prefijo" id="prefijo">

            <label for="codigo_cliente">Código del Cliente:</label>
            <input type="number" name="codigo_cliente" id="codigo_cliente">

            <label for="fecha_desde">Fecha Desde:</label>
            <input type="date" name="fecha_desde" id="fecha_desde">

            <label for="fecha_hasta">Fecha Hasta:</label>
            <input type="date" name="fecha_hasta" id="fecha_hasta">

            <button type="submit">Consultar</button>
        </form>


        <input type="button" value="Mostrar Tabla" id="tabla" />
        <div class="tabla-datos" id="tabla-datos">


        </div>


    </div>

</x-platform>
