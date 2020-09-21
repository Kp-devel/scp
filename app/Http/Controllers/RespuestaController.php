<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Respuesta;

class RespuestaController extends Controller
{
    public function respuestaGestion($tipo){
        return Respuesta::respuestaGestion($tipo);
    }

    public function listRespuestas(){
        return Respuesta::listRespuestas();
    }
}
