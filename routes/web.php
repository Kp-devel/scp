<?php

use Illuminate\Support\Facades\Route;


Route::get('/home', function(){
    return view('panelPrincipal');
});
Route::get('panel/{opcion}', function($opcion){
    return view('contenido',compact('opcion'));
})->name('panel');

Route::get('panel/cliente/detalle', function(){
    return view('detalleCliente');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function(){
    
    // control de llamadas - elastix
Route::get('/', 'ControlLLamadaController@panelcontrolllamadas');

});

