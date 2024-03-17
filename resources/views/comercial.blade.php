@extends('layouts.platform')

@section('title', 'Comercial')

@section('content')
    <h1>Comercial</h1>
    <div class="container-lg bg-primary">
        <div class="col tab bg-danger">
            <h1>TABULADORES</h1>
        </div>
        <div class="col-md consult">
            <h1>SELECT</h1>
            <form id="demoform" action="#" method="post">
                <div class="col-sm-8">
                    <select multiple="multiple" size="10" name="duallistbox_permissions[]" id="test">
                    </select>
                </div>

                <input type="button" value="add toto" id="toto" />
                <input type="button" value="refresh toto" id="tototo" />
                <input type="button" value="test" id="tata"></button>
                <button class="btn btn-success">Clickeame Me</button>
            </form>

        </div>

    </div>
    <div class="container-lg bs-primary">
        <h1>Acumulado por Mes</h1>

    <form action="{{ route('mostrarAcumuladoPorMes') }}" method="GET">
        <label for="codigo_cliente">Código del Cliente:</label>
        <input type="number" name="codigo_cliente" id="codigo_cliente">

        <label for="fecha_desde">Fecha Desde:</label>
        <input type="date" name="fecha_desde" id="fecha_desde">

        <label for="fecha_hasta">Fecha Hasta:</label>
        <input type="date" name="fecha_hasta" id="fecha_hasta">

        <button type="submit">Consultar</button>
    </form>

    <h2>Resultados:</h2>
    <table>
        <caption>Filtro para Registros</caption>
        <thead>
            <tr>
                <th>Mes</th>
                <th>Año</th>
                <th>Gasto Total</th>
                <th>Costo Líquido Total</th>
                <th>Costo Fijo Total</th>
                <th>Comisión Total</th>
                <th>Ganancia Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $dato)
            <tr>
                <td>{{ $dato->mes }}</td>
                <td>{{ $dato->año }}</td>
                <td>{{ $dato->gasto_total }}</td>
                <td>{{ $dato->costo_liquido_total }}</td>
                <td>{{ $dato->costo_fijo_total }}</td>
                <td>{{ $dato->comision_total }}</td>
                <td>{{ $dato->ganancia_total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>





@endsection

@section('scripts')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-duallistbox@3.0.6/dist/jquery.bootstrap-duallistbox.min.js">
    </script> --}}

@endsection
