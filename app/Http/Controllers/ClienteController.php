<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Telefono;
use App\Cuenta;
use App\Gestion;

class ClienteController extends Controller
{
    public function buscarClientes(Request $rq){
        return Cliente::buscarClientes($rq);
    }

    public function dataCliente(Request $rq){
        $cliente=Cliente::datosCliente($rq);
        if(count($cliente)>0){
            $tel=Telefono::telefonosCliente($cliente[0]->id);
            $cuentas=Cuenta::cuentasCliente($cliente[0]->id);
            $gestiones=Gestion::gestionesCliente($cliente[0]->id);
            $datos=["cliente"=>$cliente,
                    "telefonos"=>$tel,
                    "cuentas"=>$cuentas,
                    "gestiones"=>$gestiones
                   ];
            return $datos;
        }
    }
}
