@extends('layouts.app')

@section('template_title')
    {{ $grupoUsuario->name ?? "{{ __('Show') Grupo Usuario" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Grupo Usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('grupo-usuarios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Gruponombre:</strong>
                            {{ $grupoUsuario->grupoNombre }}
                        </div>
                        <div class="form-group">
                            <strong>Gruponivel:</strong>
                            {{ $grupoUsuario->grupoNivel }}
                        </div>
                        <div class="form-group">
                            <strong>Grupoestado:</strong>
                            {{ $grupoUsuario->grupoEstado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection