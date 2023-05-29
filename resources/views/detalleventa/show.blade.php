@extends('adminlte::page')

@section('template_title')
    {{ $detalleventa->name ?? "{{ __('Ver') Detalleventa" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Detalleventa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detalleventas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idproducto:</strong>
                            {{ $detalleventa->idproducto }}
                        </div>
                        <div class="form-group">
                            <strong>Idventa:</strong>
                            {{ $detalleventa->idventa }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $detalleventa->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $detalleventa->precio }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
