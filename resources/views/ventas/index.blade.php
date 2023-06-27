@extends('adminlte::page')

@section('template_title')
    Venta
@endsection

@section('content')
    <h1>Listado de Ventas</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Usuario</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Método de Pago</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->producto->nombre }}</td>
                    <td>{{ $venta->user->name }}</td>
                    <td>{{ $venta->cantidad }}</td>
                    <td>{{ $venta->precio }}</td>
                    <td>{{ $venta->metodo_pago }}</td>
                    <td>{{ $venta->fecha }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection