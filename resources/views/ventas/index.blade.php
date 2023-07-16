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
            <a href="{{ route('ventas.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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

<!-- Formulario de búsqueda por fecha -->
<form action="{{ route('ventas.index') }}" method="GET">
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ request('fecha') }}" >
        </div>
        <div class="col-md-4 mb-3" style="margin-top: 32px">
            <button type="submit" class="btn btn-primary" posi>Buscar</button>
        </div>
    </div>
</form>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ventas as $venta)
            <tr>
                <td>{{ $venta->id }}</td>
                <td>{{ $venta->user->name ?? '' }}</td> 
                <td>{{ $venta->created_at }}</td>
                <td>{{ $venta->proveedor->nombre }}</td>
                <td>${{ $venta->total }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('ventas.show',$venta->id) }}">
                        <i class="fa fa-fw fa-eye"></i> {{ __() }}
                    </a>
                    <a class="btn btn-sm btn-secondary" href="{{ route('ventas.exportar.pdf', ['id' => $venta->id]) }}" class="btn btn-primary" target="_blank">
                        <i class="fas fa-file-pdf"></i>
                    </a>
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

