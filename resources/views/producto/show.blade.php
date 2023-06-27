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
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> {{ __('< Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $producto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $producto->categoria->nombre }}
                        </div>
                        
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            @if($producto->cantidad < 10)
                                <h2 class="badge badge-danger"><i class="fas fa-archive" aria-hidden="true"></i> {{ $producto->cantidad  }} en stock</h2>
                            @else
                                <h2 class="badge badge-success"><i class="fas fa-archive" aria-hidden="true"></i>{{ $producto->cantidad }} en stock</h2>
                            @endif
                            
                        </div>
                        <div class="form-group">
                            <strong>Precio compra:</strong>
                            {{ $producto->precioCompra }}
                        </div>
                        <div class="form-group">
                            <strong>Precio venta:</strong>
                            {{ $producto->precioVenta }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            <span class="right badge badge-{{ $producto->estado ? 'success' : 'danger' }}">{{$producto->estado ? 'Activo' : 'Inactivo'}}</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection