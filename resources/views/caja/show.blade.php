@extends('layouts.app')

@section('template_title')
    {{ $caja->name ?? "{{ __('Show') Caja" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Caja</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cajas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idusuario:</strong>
                            {{ $caja->idusuario }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $caja->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Estadocaja:</strong>
                            {{ $caja->estadoCaja }}
                        </div>
                        <div class="form-group">
                            <strong>Totalcaja:</strong>
                            {{ $caja->totalCaja }}
                        </div>
                        <div class="form-group">
                            <strong>Observacion:</strong>
                            {{ $caja->observacion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
