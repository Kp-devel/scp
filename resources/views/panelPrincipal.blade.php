@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-transparent pt-3 pb-3 mb-3 bg-white navbar-fixed-top border-top-blue border-bottom">
        <div class="container-fluid px-0">
            <div class="navbar-wrapper d-flex">
                <a href="#" class="icono-bars waves-effect mr-3" onclick="menu()"><i class="fa fa-bars fa-lg"></i></a>
                <img src="{{asset('img/logoo.png')}}" width="100px" height="45px" >
            </div>
            <button class="navbar-toggler p-0" type="button" data-toggle="collapse" data-target="#navigation"  aria-expanded="false" aria-label="Toggle navigation">
                    <img src="img/center.jpeg" alt="" width="35px" height="35px" class=" rounded-circle border">
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item pt-1 px-2 text-right d-flex">
                            <div>
                                <p class="font-11 mb-0 font-weight-bold">Usuario</p>
                                <a href="{{ route('logout') }}" class="text-black" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            <i class="fa fa-headset fa-2x pl-2 pt-2"></i>
                        </li>
                    </ul>
            </div>
        </div>
    </nav>
    <div class="contenedor-general">
        <div class="content-menu">
            <div class="border-bottom rounded">
                <p class="text-white mb-0 px-3 pt-2 font-13 py-3">Panel de Control</p>
            </div>
            <div class="menu-option pt-2">
                <a href="{{route('panel',['opcion'=>'contacto'])}}" class="px-3 waves-effect {{ request()->is('panel/contacto') ? 'menu-active' : '' }}"><i class="fa fa-desktop pr-2"></i>Contacto</a>     
                <a href="{{route('panel',['opcion'=>'nocontacto'])}}" class="px-3 waves-effect {{ request()->is('panel/nocontacto') ? 'menu-active' : '' }}"><i class="fa fa-desktop pr-2"></i>No Contacto</a>     
                <a href="{{route('panel',['opcion'=>'compromisoscaidos'])}}" class="px-3 waves-effect {{ request()->is('panel/compromisoscaidos') ? 'menu-active' : '' }}"><i class="fa fa-desktop pr-2" ></i>Compromisos Caídos</a>     
                <a href="{{route('panel',['opcion'=>'compromisospendientes'])}}" class="px-3 waves-effect {{ request()->is('panel/compromisospendientes') ? 'menu-active' : '' }}"><i class="fa fa-desktop pr-2"></i>Compromisos Pendientes</a>     
                <a href="{{route('panel',['opcion'=>'operativos'])}}" class="px-3 waves-effect {{ request()->is('panel/operativos') ? 'menu-active' : '' }}"><i class="fa fa-desktop pr-2"></i>Operativos</a>     
                <!-- <a href="" class="px-3 waves-effect {{ request()->is('panelcontrolllamadas') ? 'menu-active' : '' }}"><i class="fa fa-desktop pr-2"></i>Operativos</a>      -->
            </div>
        </div>
        <div class="content-body">
            <div class="contenedor-body px-4">
                @yield('panel-contenido')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function menu(){
            $('.content-menu').toggleClass('abrir');            
            $('.content-body').toggleClass('p-left');            
        }
    </script>
@endsection