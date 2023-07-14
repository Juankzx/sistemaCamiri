@extends('adminlte::page')

@section('template_title')
    {{ __('Detalles de la Venta') }}
@endsection

@section('content')
<div class="card-header">
    <div class="float-left">
        <span class="card-title">{{ __('Ver') }} Ventas #{{ ($venta->id) }}</span>
    </div>
    <div class="float-right">
        <a class="btn btn-primary" href="{{ route('ventas.index') }}"> {{ __('< Volver') }}</a>
    </div>
</div>
<div class="invoice-container">
        <div class="invoice-header">
            <h1>Factura de Venta</h1>
            <h3>Fecha: {{ $venta->created_at->format('d/m/Y') }}</h3>
        </div>
        <div class="invoice-info">
            <div class="row">
                <div class="col-md-6">
                    <h4>Cliente</h4>
                    <p>Nombre: {{ $venta->proveedor->nombre }}</p>
                    <p>Dirección: {{ $venta->proveedor->direccion }}</p>
                    <p>Telefono: {{ $venta->proveedor->telefono }}</p>
                </div>
                <div class="col-md-6 text-left">
                    <h4>Número de Factura:</h4>
                    <p>{{ $venta->id }}</p>
                </div>
            </div>
        </div>
        <div class="invoice-details">
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($venta->detallesVentas as $detalle)
                        <tr>
                            <td>{{ $detalle->producto->nombre }}</td>
                            <td>{{ $detalle->cantidad }}</td>
                            <td>${{ $detalle->precio_unitario }}</td>
                            <td>${{ $detalle->cantidad * $detalle->precio_unitario }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-right"><strong>Total:</strong></td>
                        <td>${{ $venta->total }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .invoice-container {
            padding: 20px;
            background-color: #f7f7f7;
            border: 1px solid #ccc;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-info {
            margin-bottom: 20px;
        }

        .invoice-details th {
            background-color: #f3f3f3;
        }

        .invoice-details td,
        .invoice-details th {
            padding: 8px;
        }

        .text-right {
            text-align: right;
        }
    </style>
@endsection

@section('css')
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
@stop

@section('js')
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stop

@section('js')
    <script>
        // Muestra la alerta una vez que la página se haya cargado
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('error') }}',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    }
                });
            @endif
        });
    </script>
@endsection
