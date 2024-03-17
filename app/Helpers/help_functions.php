<?php


use Carbon\Carbon;

if (!function_exists('formatoMoneda')) {
    function formatoMoneda($valor)
    {

         return 'R$ ' . number_format($valor, 2, ',', '.');
    }
}

if (!function_exists('ultimoDiaMes')) {
    function ultimoDiaMes($fecText)
    {


        $fecFormatted = Carbon::createFromFormat('Y-m-d', $fecText); // Suponiendo que tienes el primer día de marzo de 2024 como fecha

        $ultimoDiaMes = $fecFormatted->endOfMonth(); // Obtiene el último día del mes de la fecha dada

        return $ultimoDiaMes->toDateString(); // Imprime la fecha en formato 'Y-m-d'

    }
}


if (!function_exists('nombreMes2')) {

    function nombreMes2($numeroMes, $abreviado = false)
    {
        $meses = [
            1 => ['Enero', 'Ene'],
            2 => ['Febrero', 'Feb'],
            3 => ['Marzo', 'Mar'],
            4 => ['Abril', 'Abr'],
            5 => ['Mayo', 'May'],
            6 => ['Junio', 'Jun'],
            7 => ['Julio', 'Jul'],
            8 => ['Agosto', 'Ago'],
            9 => ['Septiembre', 'Sep'],
            10 => ['Octubre', 'Oct'],
            11 => ['Noviembre', 'Nov'],
            12 => ['Diciembre', 'Dic']
        ];

        if ($abreviado) {
            return $meses[$numeroMes][1];
        } else {
            return $meses[$numeroMes][0];
        }
    }

}

if(!function_exists('nombreMes')){
    function nombreMes($input, $abreviado = false)
{
    $meses = [
        1 => ['Enero', 'Ene'],
        2 => ['Febrero', 'Feb'],
        3 => ['Marzo', 'Mar'],
        4 => ['Abril', 'Abr'],
        5 => ['Mayo', 'May'],
        6 => ['Junio', 'Jun'],
        7 => ['Julio', 'Jul'],
        8 => ['Agosto', 'Ago'],
        9 => ['Septiembre', 'Sep'],
        10 => ['Octubre', 'Oct'],
        11 => ['Noviembre', 'Nov'],
        12 => ['Diciembre', 'Dic']
    ];

    // Verificar si el input es un número de mes
    if (is_numeric($input) && $input >= 1 && $input <= 12) {
        $numeroMes = (int) $input;
        if ($abreviado) {
            return $meses[$numeroMes][1];
        } else {
            return $meses[$numeroMes][0];
        }
    }

    // Convertir el nombre del mes a título y eliminar espacios en blanco adicionales
    $nombreMes = ucfirst(strtolower(trim($input)));

    // Verificar si el nombre del mes está en el array de meses
    foreach ($meses as $numero => $mes) {
        if (in_array($nombreMes, $mes)) {
            return sprintf('%02d', $numero);
        }
    }

    // Si no se encuentra el mes, retornar false
    return false;
}

}


if (!function_exists('formaDate'))
 {
    function formatDate($fechaStr)
    {

    $fecha = Carbon::createFromFormat('Y-m-d', $fechaStr .'-01'); // Suponiendo que tienes el primer día de marzo de 2024 como fecha

    $ultimoDiaMes = $fecha->endOfMonth(); // Obtiene el último día del mes de la fecha dada

    return $ultimoDiaMes->toDateString(); // Imprime la fecha en formato 'Y-m-d'
    }
}

