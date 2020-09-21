<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => ['auth']], function(){
    
    // control de llamadas - elastix
    Route::get('/', function(){return view('panelPrincipal');});
    Route::get('/home', function(){return view('panelPrincipal');});

    // Route::get('panel/{opcion}', function($opcion){
    //     return view('contenido',compact('opcion'));
    // })->name('panel');
    Route::get('panel/{opcion}','HomeController@panelContenido')->name('panel');
    
    // clientes
    Route::post('panel/buscar/buscarClientes','ClienteController@buscarClientes')->name('buscarClientes');
    Route::post('panel/buscar/dataCliente','ClienteController@dataCliente')->name('dataCliente');

    // respuestas
    Route::get('respuestaGestion/{tipo}','RespuestaController@respuestaGestion');
    Route::get('panel/lista/respuestas','RespuestaController@listRespuestas');

    // gestion
    Route::post('panel/insertar/insertGestion','GestionController@insertGestion')->name('insertGestion');

    //tablas
    // Route::get('filtros/zona','RespuestaController@respuestaGestion');


    Route::get('panel/cliente/detalle', function(){
        return view('detalleCliente');
    });

});

