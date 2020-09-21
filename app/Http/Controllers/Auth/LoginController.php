<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {        
        $sql=collect(DB::select(DB::raw("
            SELECT
                fld_cod_ofi
            FROM
                tbl_usuario
            where
                fld_nivel=0
            LIMIT 1
        "),array("id"=>auth()->user()->emp_id)));
        
        if($sql->isNotEmpty()){
            $user->setSession($sql->toArray());
        }else{
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('login')->withErrors(['error'=>'Este usuario no se encuentra activo']);
        }

    }

    public function username(){
        return 'fld_cod_usu';
    }


}
