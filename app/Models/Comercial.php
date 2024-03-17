<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comercial extends Model
{
    use HasFactory;

    /* public function obtenerAcumuladoPorMes($codigoCliente, $fechaDesde, $fechaHasta)
    {
        return DB::select('CALL perf_comercial(?, ?, ?)', [$codigoCliente, $fechaDesde, $fechaHasta]);
    }*/

    /* public function obtenerAcumuladoPorMes($prefijo)
    {
        return DB::select('CALL obtener_usuario(?)', [$prefijo]);
    }
 */


    public function obtenerDatosPerformance($fec_desde,$fec_hasta)
    {

        return DB::select('CALL sp_comercial_performance(?,?)', [$fec_desde, $fec_hasta]);
    }


}


