<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Cliente extends Model
{
    public static function buscarClientes(Request $rq){
        // return $rq->all();
        $respuestas=$rq->respuestas;
        $campana=$rq->campana;
        $zona=$rq->zona;
        $tramo_deuda=$rq->tramo_deuda;
        $tramo_atraso=$rq->tramo_atraso;
        $sql="";

        if($respuestas!=''){
            $sql.=" and fld_cod_res in ($respuestas) ";
        }
        if($zona!=''){
            $sql.=" and fld_zona=$zona ";
        }
        if($tramo_deuda!=''){
            $sql.=" and fld_tra_deu=$tramo_deuda ";
        }
        if($tramo_atraso!=''){
            $sql.=" and fld_tra_dia=$tramo_atraso ";
        }                   

        return DB::select(DB::raw("
                    SELECT 
                        count(*) as cantidad
                    FROM
                        tbl_clientes c
                    LEFT JOIN tbl_gestion g on c.fld_ult_ges=g.fld_ges_id
                    WHERE
                        fld_est_reg=0
                    and fld_usu_tel=:usu
                    $sql
        "),array("usu"=>auth()->user()->fld_cod_usu));
    }

    public static function datosCliente(Request $rq){
        // return $rq->all();
        $respuestas=$rq->respuestas;
        $campana=$rq->campana;
        $zona=$rq->zona;
        $tramo_deuda=$rq->tramo_deuda;
        $tramo_atraso=$rq->tramo_atraso;
        $sql="";

        if($respuestas!=''){
            $sql.=" and fld_cod_res in ($respuestas) ";
        }
        if($zona!=''){
            $sql.=" and c.fld_zona=$zona ";
        }
        if($tramo_deuda!=''){
            $sql.=" and c.fld_tra_deu=$tramo_deuda ";
        }
        if($tramo_atraso!=''){
            $sql.=" and c.fld_tra_dia=$tramo_atraso ";
        }                   

        return DB::select(DB::raw("
                    SELECT 
                        c.fld_cli_id as id,
                        c.fld_cod_ced as cedente,
                        c.fld_num_doc as documento,
                        td.fld_descripcion as tipo_documento,
                        if(fld_nom_cli is null || fld_nom_cli in (''),concat(fld_nombres,' ',fld_ape_pat,' ',fld_ape_mat),fld_nom_cli) as nombres,
                        tr.fld_descripcion as tramo,
                        c.fld_grupo as grupo,
                        tz.fld_descripcion as zona,
                        c.fld_cod_ofi as oficina,
                        d.fld_direccion as direccion,
                        d.fld_dir_dis as distrito,
                        d.fld_dir_prv as provincia,
                        d.fld_dir_dpt as departamento
                    FROM
                        tbl_clientes c
                    LEFT JOIN tbl_gestion g on c.fld_ult_ges=g.fld_ges_id and date(fld_fec_ges)<date(now())
                    LEFT JOIN tbl_tablas td on c.fld_tip_doc=td.fld_ind_tabla and td.fld_tabla=10 and td.fld_estado=0
                    LEFT JOIN tbl_tablas tr on c.fld_tra_deu=tr.fld_ind_tabla and tr.fld_tabla=50 and tr.fld_estado=0
                    LEFT JOIN tbl_tablas tz on c.fld_zona=tz.fld_ind_tabla and tz.fld_tabla=70 and tz.fld_estado=0
                    LEFT JOIN tbl_direcciones d on c.fld_cli_id=d.fld_cli_id_FK and fld_est_dir=0
                    WHERE
                        fld_est_reg=0
                    and fld_usu_tel=:usu
                    $sql
                    GROUP BY fld_cli_id
                    ORDER BY RAND()
                    LIMIT 1
        "),array("usu"=>auth()->user()->fld_cod_usu));
    }

    public static function updateUltimaGestion($idCliente,$idGestion){
        DB::update("
            update tbl_clientes
            set fld_ult_ges=:ges
            where fld_cli_id=:id
        ",array("ges"=>$idGestion,"id"=>$idCliente));
        return "ok";
    }
}
