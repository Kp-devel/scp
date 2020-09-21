<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Respuesta;
use App\Tabla;

class HomeController extends Controller
{
    public function panelContenido($opcion){
        $tipo="";
        $data="";
        $filtros="";
        $operativo="";
        if($opcion=='operativos'){
            $operativo="";
        }else{
            if($opcion=='contacto' || $opcion=='nocontacto'){
                if($opcion=='contacto'){
                    $tipo='C';
                }else{
                    $tipo='N';
                }
                $res=Respuesta::respuestaGestion($tipo);
                $data=json_encode($res);
            }

            $zonas=Tabla::zonas();
            $tramo_deuda=Tabla::tramoDeuda();
            $tramo_atraso=Tabla::tramoAtraso();
            $campanas=Tabla::campanas();

            $filtros=[
                "campanas"=>$campanas,
                "zonas"=>$zonas,
                "tramoDeuda"=>$tramo_deuda,
                "tramoAtraso"=>$tramo_atraso
            ];
            $filtros=json_encode($filtros);
        }

        return view('contenido',compact('opcion','data','filtros','operativo'));
    }    
}
