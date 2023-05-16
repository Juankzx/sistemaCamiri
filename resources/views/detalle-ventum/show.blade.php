@extends('layouts.app')

@section('template_title')
    {{ $detalleVentum->name ?? "{{ __('Show') Detalle Ventum" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Detalle Ventum</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detalle-venta.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idproducto:</strong>
                            {{ $detalleVentum->idproducto }}
                        </div>
                        <div class="form-group">
                            <strong>Idventa:</strong>
                            {{ $detalleVentum->idventa }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $detalleVentum->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $detalleVentum->precio }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
