@extends('panelPrincipal')

@section('panel-contenido')           
    <div class="contenedor">
        @if($opcion=='contacto')          
            <busqueda-paleta :tipo="1" :datos="{{$data}}" :filtros="{{$filtros}}"/>
        @endif
        @if($opcion=='nocontacto')
            <busqueda-paleta :tipo="2" :datos="{{$data}}" :filtros="{{$filtros}}"/>
        @endif
        @if($opcion=='compromisoscaidos')
            <busqueda-adicional :tipo="1" :filtros="{{$filtros}}"/>
        @endif
        @if($opcion=='compromisospendientes')
            <busqueda-adicional :tipo="2" :filtros="{{$filtros}}"/>
        @endif
        @if($opcion=='operativos')
            <div class="d-flex pb-3">
                <i class="fa fa-desktop pr-2 fa-lg pt-3 text-green"></i>
                <div>
                    <p class="subheader-title mb-0">Operativos</p>
                    <p class="mb-0">280 Clientes</p>
                </div>
            </div>
            <operativos />
        @endif
    </div>


@endsection
