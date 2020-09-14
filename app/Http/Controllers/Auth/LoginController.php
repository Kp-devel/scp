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

    protected $redirectTo = '/panelcontrolllamadas';
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {        
        $sql=collect(DB::connection('mysql')->select(DB::raw("
            SELECT
                car_id_FK AS idcartera
            FROM
                creditoy_cobranzas.empleado e
            LEFT JOIN creditoy_cobranzas.cliente c ON c.emp_tel_id_FK = e.emp_id and cli_est = 0 AND cli_pas = 0
            WHERE
                emp_id=:id
            AND emp_est = 0
            AND emp_pas = 0
            AND emp_tip_acc = 1
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
        return 'emp_cod';
    }


}
