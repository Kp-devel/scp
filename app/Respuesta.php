<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Respuesta extends Model
{
    public static function respuestaGestion($tipo){
        return DB::select(DB::raw("
                SELECT 
                    fld_cli_id as id,
                    fld_desc_larga as respuesta,
                    fld_cod_res as cod_respuesta,
                    count(fld_cli_id) as cuentas,
                    sum(fld_mon_deu) as deuda
                FROM
                    tbl_clientes m
                INNER JOIN tbl_gestion g on m.fld_ult_ges=g.fld_ges_id
                INNER JOIN tbl_respuesta r on r.fld_cod_resp=g.fld_cod_res
                LEFT JOIN tbl_deuda d ON m.fld_cli_id=d.fld_cli_id_FK
                WHERE
                    fld_tipo=:tipo
                GROUP BY fld_res_id
        "),array("tipo"=>$tipo));
    }

    public static function listRespuestas(){
        return DB::select(DB::raw("
                    SELECT 
                        fld_cod_resp as cod_respuesta,
                        fld_desc_larga as respuesta
                    from
                        tbl_respuesta
                    where 
                        fld_estado=0
                    order by fld_tipo
                "));
    }
}
