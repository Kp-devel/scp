@extends('layouts.app')

@section('contentLogin')
<div class="container bg-gray-2" style="height:100vh;min-width:100vw;padding-top:100px;">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card border-top-blue">
                <div class="card-body">
                    <div class="logo d-flex justify-content-center mb-2">
                        <img src="img/logoo.png">
                    </div>
                    <div class="text-center">
                        <p class="text-blue font-bold mb-0">ACCESO AL SISTEMA</p>
                    </div>
                    <div class="px-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="fld_cod_usu" class="col-form-label text-md-right">Usuario</label>
                                <input id="fld_cod_usu" type="text" class="form-control form-control-sm @error('fld_cod_usu') is-invalid @enderror" name="fld_cod_usu" value="{{ old('fld_cod_usu') }}" required autofocus>
                                @error('fld_cod_usu')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        
                            <div class="form-group">
                                <label for="password" class="col-form-label text-md-right">Contraseña</label>
                                <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                            <div class="form-group mb-0 text-right">
                                <button type="submit" class="btn btn-blue">
                                    Iniciar Sesión
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
