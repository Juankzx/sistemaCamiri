@extends('adminlte::page')

@section('template_title')
    {{ $producto->name ?? "{{ __('Ver') Producto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idcategoria:</strong>
                            {{ $producto->idcategoria }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $producto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $producto->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Preciocompra:</strong>
                            {{ $producto->precioCompra }}
                        </div>
                        <div class="form-group">
                            <strong>Precioventa:</strong>
                            {{ $producto->precioVenta }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
