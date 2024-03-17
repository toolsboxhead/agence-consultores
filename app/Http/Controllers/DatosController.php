<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QueryModel;
use Illuminate\Support\Facades\Facade;

class DatosController extends Controller
{
    public function mostrarDatosUsuario(Request $request)
    {

        $nombreUsuario = $request->input('nombreUsuario');
        print $nombreUsuario;
        if (empty($nombreUsuario)) {
            return view('comercial.datosview');
        } else {

            $queryModel = new QueryModel();
            $datos = $queryModel->obtenerDatosUsuario($nombreUsuario);
            return view('comercial.datosview', ['datos' => $datos]);
        }
    }

    public function mostrarVista(){

        return view('comercial.datosview');
    }
}

