<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tabla;

class TablaController extends Controller
{
    public function tramoDeuda(){
        return Tabla::tramoDeuda();
    }

    public function tramoAtraso(){
        return Tabla::tramoAtraso();
    }

    public function zonas(){
        return Tabla::zonas();
    }

    public function campanas(){
        return Tabla::campanas();
    }
}
