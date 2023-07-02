@extends('adminlte::page')

@section('template_title')
    Usuario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idgrupousuario:</strong>
                            {{ $usuario->idgrupoUsuario }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $usuario->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Nombreusuario:</strong>
                            {{ $usuario->nombreUsuario }}
                        </div>
                        <div class="form-group">
                            <strong>Contraseña:</strong>
                            {{ $usuario->contraseña }}
                        </div>
                        <div class="form-group">
                            <strong>Nivelusuario:</strong>
                            {{ $usuario->nivelUsuario }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $usuario->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('css')
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stop


