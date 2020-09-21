<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Cuenta extends Model
{
    public static function cuentasCliente($id){
        return DB::select(DB::raw("
            select 
                fld_cod_pro as producto,
                fld_num_cta as num_cuenta,
                fld_fec_cta as fecha_venc,
                fld_mon_cap as capital,
                fld_mon_deu as deuda,
                fld_int_cob as interes,
                fld_hon_cob as honorarios,
                fld_gas_exc as gasto_exc,
                fld_otr_cos as otros,
                fld_descripcion as moneda
            from
                tbl_deuda d
                LEFT JOIN tbl_tablas t on d.fld_cod_mon=t.fld_ind_tabla and fld_tabla=30 and fld_estado=0
            where
                fld_cli_id_FK=:id
            and fld_est_reg=0
        "),array("id"=>$id));
    }
}
