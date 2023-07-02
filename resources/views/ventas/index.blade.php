@extends('adminlte::page')

@section('template_title')
    Venta
@endsection

@section('content')
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">

            <span id="card_title">
                <h1>Listado de Ventas</h1>
            </span>

             <div class="float-right">
                <a href="{{ route('ventas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                  {{ __('+ AGREGAR') }}
                </a>
              </div>
        </div>
    </div>

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
                <th>Proveedor</th>
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
                    <td>{{ $venta->proveedor->nombre }}</td>
                    <td>{{ $venta->cantidad }}</td>
                    <td>{{ $venta->precio }}</td>
                    <td>{{ $venta->metodo_pago }}</td>
                    <td>{{ $venta->created_at }}</td>
                    <td>
                        <a href="{{ route('ventas.exportar.pdf', ['id' => $venta->id]) }}" class="btn btn-primary" target="_blank">
                            <i class="fas fa-file-pdf"></i></a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('css')
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stop
