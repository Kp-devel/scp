<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
    protected $table = "tbl_usuario";
    protected $primaryKey = "fld_id";

    protected $fillable = [
        'fld_cod_usu','fld_nom_usu', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setSession($sql){
        if(count($sql)==1){
            Session::put([
                'datos'=>$sql[0]
                ]
            );
        }
    }

}
