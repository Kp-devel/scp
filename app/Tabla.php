<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Tabla extends Model
{
    public static function tramoDeuda(){
        return DB::select(DB::raw("
                SELECT
                    fld_ind_tabla as id,
                    fld_descripcion as descripcion
                FROM
                    tbl_tablas
                WHERE fld_tabla=50
                and fld_estado=0
                and fld_ind_tabla <> 0
        "));
    }

    public static function tramoAtraso(){
        return DB::select(DB::raw("
                SELECT
                    fld_ind_tabla as id,
                    fld_descripcion as descripcion
                FROM
                    tbl_tablas
                WHERE fld_tabla=60
                and fld_estado=0
                and fld_ind_tabla <> 0
        "));
    }

    public static function zonas(){
        return DB::select(DB::raw("
                SELECT
                    fld_ind_tabla as id,
                    fld_descripcion as descripcion
                FROM
                    tbl_tablas
                WHERE fld_tabla=70
                and fld_estado=0
                and fld_ind_tabla <> 0
        "));
    }

    public static function campanas(){
        return DB::select(DB::raw("
                SELECT
                    fld_ind_tabla as id,
                    fld_descripcion as descripcion
                FROM
                    tbl_tablas
                WHERE fld_tabla=80
                and fld_estado=0
                and fld_ind_tabla <> 0
        "));
    }
}
