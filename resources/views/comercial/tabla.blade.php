<table Class="table table-striped">
    <caption>Tabla Resumen de Desempeño</caption>
    <thead>
        <th>Per&iacuteodo</th>
        <th>Período</th>
        <th>Receita L&iacutequida</th>
        <th>Custo Fixo</th>
        <th>Comiss&atildeo</th>
        <th>Lucro</th>
    </thead>
    <tbody>
        <p>{{ $prefijo }}</p>
        <p>{{ $mostrarTablaDatos }}</p>
        {{-- @foreach ($datos as $dato)
            <tr>
                <td>{{ $dato->mes }}</td>
                <td>{{ $dato->año }}</td>
                <td>{{ $dato->gasto_total }}</td>
                <td>{{ $dato->costo_liquido_total }}</td>
                <td>{{ $dato->costo_fijo_total }}</td>
                <td>{{ $dato->comision_total }}</td>
                <td>{{ $dato->ganancia_total }}</td>
            </tr>
        @endforeach --}}
        <tr>
            <td>SALDO</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
