<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Gestion extends Model
{
    public static function gestionesCliente($id){
        return DB::select(DB::raw("
            select 
                fld_fec_ges as fecha_gestion,
                fld_desc_larga as respuesta,
                fld_cod_usu as usuario,
                fld_num_tel as telefono,
                fld_observacion as observacion
            from
                tbl_gestion g
                INNER JOIN tbl_respuesta r on g.fld_cod_res=r.fld_cod_resp 
            where
                fld_cli_id_FK=:id
            order by fld_fec_ges desc
        "),array("id"=>$id));
    }


    public static function insertGestion(Request $rq,$fecha){
        $telefono=$rq->telefono;
        $id=$rq->id;
        $respuesta=$rq->respuesta;
        $observacion=$rq->observacion;
        $fecha_comp=$rq->fecha_comp;
        $usuario=auth()->user()->fld_cod_usu;
        DB::insert("
            insert into tbl_gestion (fld_cli_id_FK,fld_fec_ges,fld_cod_res,fld_cod_usu,fld_num_tel,fld_observacion)
            values (:id,:fecha,:res,:usu,:tel,:obs)
        ",array("id"=>$id,"fecha"=>$fecha,"res"=>$respuesta,"usu"=>$usuario,"tel"=>$telefono,"obs"=>$observacion));
        return "ok";
    }

    public static function selectIdGestion(Request $rq,$fecha){
        $id=$rq->id;
        $respuesta=$rq->respuesta;
        $usuario=auth()->user()->fld_cod_usu;
        return DB::select(DB::raw("
                select 
                    fld_ges_id as id
                from 
                    tbl_gestion 
                where
                    fld_fec_ges=:fecha
                and fld_cli_id_FK=:id
                and fld_cod_res=:res
                and fld_cod_usu=:usu
        "),array("id"=>$id,"fecha"=>$fecha,"res"=>$respuesta,"usu"=>$usuario));
    }
}
