<h2>
    Resultados:</h2>
<table Class="table table-striped">
    <caption>Tabla Resumen de Desempeño</caption>
    <thead>

    </thead>
    <tbody>

        @if (isset($datos))

            @php
                $sameConsultor = false;
                $firstCons = true;
                $total_RL = 0;
                $total_SB = 0;
                $total_CO = 0;
                $total_LU = 0;
            @endphp


            @foreach ($datos as $dato)
                @if (!$firstCons)
                    @php
                        $sameConsultor = $dato->nom_user == $consultorAnte ? true : false;
                    @endphp
                @endif

                @if (!$sameConsultor)
                    @if (!$firstCons)
                        <tr>
                            <th>SALDO</th>
                            <th>{{ formatoMoneda($total_RL) }}</th>
                            <th>{{ formatoMoneda($total_SB) }}</th>
                            <th>{{ formatoMoneda($total_CO) }}</th>
                            <th>{{ formatoMoneda($total_LU) }}</th>

                        </tr>
                    @endif
                    @php
                        $firstCons = false;
                    @endphp
                    <tr>
                        <th>{{ $dato->nom_user }}</th>
                    </tr>
                    <tr>
                        <th>Período</th>
                        <th>Receita Líquida</th>
                        <th>Custo Fixol</th>
                        <th>Comissão</th>
                        <th>Lucro</th>
                    </tr>
                    <tr>
                        <td>{{ nombreMes($dato->mes, true) . ' - ' . $dato->annio }}</td>
                        <td>{{ formatoMoneda($dato->receita_liquida) }} </td>
                        <td>{{ formatoMoneda($dato->sal_bruto) }}</td>
                        <td>{{ formatoMoneda($dato->comissao) }}</td>
                        <td>{{ formatoMoneda($dato->lucro) }}</td>
                        @php
                            $total_RL = 0;
                            $total_SB = 0;
                            $total_CO = 0;
                            $total_LU = 0;

                            $total_RL += $dato->receita_liquida;
                            $total_SB += $dato->sal_bruto;
                            $total_CO += $dato->comissao;
                            $total_LU += $dato->lucro;
                            $sameConsultor = true;
                            $consultorAnte = $dato->nom_user;
                        @endphp
                    </tr>
                @else
                    <tr>
                        <td>{{ nombreMes($dato->mes, true) . ' - ' . $dato->annio }}</td>
                        <td>{{ formatoMoneda($dato->receita_liquida) }} </td>
                        <td>{{ formatoMoneda($dato->sal_bruto) }}</td>
                        <td>{{ formatoMoneda($dato->comissao) }}</td>
                        <td>{{ formatoMoneda($dato->lucro) }}</td>
                        @php
                            $total_RL += $dato->receita_liquida;
                            $total_SB += $dato->sal_bruto;
                            $total_CO += $dato->comissao;
                            $total_LU += $dato->lucro;
                        @endphp
                    </tr>
                @endif
            @endforeach
            <tr>
                <th>SALDO</th>
                <th>{{ formatoMoneda($total_RL) }}</th>
                <th>{{ formatoMoneda($total_SB) }}</th>
                <th>{{ formatoMoneda($total_CO) }}</th>
                <th>{{ formatoMoneda($total_LU) }}</th>

            </tr>
        @else
            <p>No hay datos disponibles actualmente.</p>
        @endif
    </tbody>
</table>
