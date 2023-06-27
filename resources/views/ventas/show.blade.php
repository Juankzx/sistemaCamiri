@extends('adminlte::page')

@section('template_title')
    {{ $venta->name ?? "{{ __('Ver') Venta" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Venta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ventas.index') }}"> {{ __('< Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $venta->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Metodopago:</strong>
                            {{ $venta->metodoPago }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
