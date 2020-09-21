<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Telefono extends Model
{
    public static function telefonosCliente($id){
        return DB::select(DB::raw("
            select 
                fld_num_tel as telefono
            from
                tbl_telefonos
            where
                fld_cli_id_FK=:id
            and fld_est_tel=0
        "),array("id"=>$id));
    }
}
