<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gestion;
use App\Cliente;
use Carbon\Carbon;

class GestionController extends Controller
{
    public function insertGestion(Request $rq){
        $telefono=$rq->telefono;
        $respuesta=$rq->respuesta;
        $observacion=$rq->observacion;
        $id=$rq->id;
        $fecha=Carbon::now();
        if($telefono!='' && $respuesta!='' && $observacion!=''){
            // registrar gestion
            Gestion::insertGestion($rq,$fecha);
            // seleccionar id de gestion registrada
            $idGestion=Gestion::selectIdGestion($rq,$fecha);
            // actualizar ult ges en tbl_clientes
            Cliente::updateUltimaGestion($id,$idGestion[0]->id);
            return "ok";
        }

    }
}
