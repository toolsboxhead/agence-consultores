<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use app\Models\Comercial;
use App\Models\QueryModel;
use Illuminate\Support\Facades\Facade;


class ComercialController extends Controller
{
    public function perf_Comercial(){
        $mostrarTablaDatos = false;
        $prefijo = "";
        return view('comercial.perf_comercial',compact('mostrarTablaDatos','prefijo'));
    }

    public function mostrarAcumuladoPorMes(Request $request)
    {

        $mostrarTablaDatos = false;
        return view('comercial.perf_comercial',compact('mostrarTablaDatos','prefijo'));

    }

    public function obtenerDatos(Request $request)
    {

        $mes_desde = $request->input('mesdesde');
        $ann_desde = $request->input('aniodesde');
        $mes_hasta = $request->input('meshasta');
        $ann_hasta = $request->input('aniohasta');
        $fec_desde = $ann_desde.'-'.$mes_desde.'-'.'01';
        $fec_hasta = ultimoDiaMes($ann_hasta.'-'.$mes_hasta.'-'.'01');
        $set_consu=$request->input('set_consults');

            $queryModel = new QueryModel();
            $datos = $queryModel->obtenerDatosPerformance($fec_desde,$fec_hasta,$set_consu);

            return response()->json([
                'html' => view('comercial.datos_perfomance',['datos' => $datos])->render()]);


    }

    public function listarConsultores(Request $request)
    {
        $queryModel = new QueryModel();
        $consults = $queryModel->listUsuarios();

            return view('comercial.perf_comercial',['consults' => $consults]);
    }

    public function graficaBarras(Request $request)
    {
        $mes_desde = $request->input('mesdesde');
        $ann_desde = $request->input('aniodesde');
        $mes_hasta = $request->input('meshasta');
        $ann_hasta = $request->input('aniohasta');
        $fec_desde = $ann_desde.'-'.$mes_desde.'-'.'01';
        $fec_hasta = ultimoDiaMes($ann_hasta.'-'.$mes_hasta.'-'.'01');
        $set_consu=$request->input('set_consults');

        $queryModel = new QueryModel();
        $datos = $queryModel->obtenerDatosPerformance($fec_desde,$fec_hasta,$set_consu);
        return response()->json([
            'html' => view('comercial.graphs.bargraphic')->render()]);
    }
}
