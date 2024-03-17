<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
 class AjaxController extends Controller {
     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {
         echo "im in AjaxController index";//simplemente haremos que devuelva esto
     }
 }
