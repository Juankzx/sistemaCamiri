@extends('adminlte::page')

@section('title', 'Detalle de Caja')

@section('content_header')
    <h1>Detalle de Caja</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Información de la Caja</h2>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID:</th>
                            <td>{{ $caja->id }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Apertura:</th>
                            <td>{{ $caja->fecha_apertura }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Cierre:</th>
                            <td>{{ $caja->fecha_cierre ?: 'Caja abierta' }}</td>
                        </tr>
                        <tr>
                            <th>Monto Apertura:</th>
                            <td>${{ $caja->monto_apertura }}</td>
                        </tr>
                        <tr>
                            <th>Monto Cierre:</th>
                            <td>${{ $caja->monto_cierre ?: 'Caja no cerrada' }}</td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>{{ $caja->cerrada ? 'Cerrada' : 'Abierta' }}</td>
                        </tr>
                        <tr>
                            <th>Numero de ventas:</th>
                            <td>{{ $ventas->count() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <h2>Ventas Realizadas mientras la Caja estaba Abierta</h2>
            @if (isset($ventas) && count($ventas) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID de Venta</th>
                            <th>Fecha de Venta</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventas as $venta)
                            <tr>
                                <td><b>{{ $venta->id }}</b></td>
                                <td><b>{{ $venta->created_at }}</b></td>
                                <td><b>${{ $venta->total }}</b></td>
                            </tr>
                            @foreach ($detalleVentas->where('venta_id', $venta->id) as $detalle)
                                <tr>
                                    <td colspan="2">- {{ $productosVendidos->find($detalle->producto_id)->nombre }}</td>
                                    <td>{{ $detalle->cantidad }} unidades</td>
                                    <td>Precio Unitario: ${{ $detalle->precio_unitario }}</td>
                                    <td>Total: ${{ $detalle->cantidad * $detalle->precio_unitario }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No se encontraron ventas realizadas mientras la caja estaba abierta.</p>
            @endif
        </div>
    </div>
@stop