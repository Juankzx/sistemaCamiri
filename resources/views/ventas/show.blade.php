@extends('adminlte::page')

@section('template_title')
    Ventas
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Venta #{{ ($venta->id) }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ventas.index') }}"> {{ __('< Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $venta->producto->nombre }}
                        </div>

                        <div class="form-group">
                            <strong>Vendedor:</strong>
                            {{ $venta->user->name }}
                        </div>

                        <div class="form-group">
                            <strong>Cliente:</strong>
                            {{ $venta->proveedor->nombre }}
                        </div>

                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $venta->cantidad }}
                        </div>
                    
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $venta->precio }}
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
