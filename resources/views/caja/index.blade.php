@extends('adminlte::page')

@section('content')
    <h1>Cajas</h1>
    <a href="{{ route('cajas.create') }}" class="btn btn-primary">Abrir Caja</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha Apertura</th>
                <th>Fecha Cierre</th>
                <th>Monto Apertura</th>
                <th>Monto Cierre</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cajas as $caja)
                <tr>
                    <td>{{ $caja->id }}</td>
                    <td>{{ $caja->fecha_apertura }}</td>
                    <td>{{ $caja->fecha_cierre }}</td>
                    <td>${{ $caja->monto_apertura }}</td>
                    <td>${{ $caja->monto_cierre }}</td>
                    <td>{{ $caja->user->name ?? '' }}</td>  
                    <td>
                        <a href="{{ route('cajas.apertura', $caja) }}" class="btn btn-primary">Abrir</a>
                        <a href="{{ route('cajas.cierre', $caja) }}" class="btn btn-danger">Cerrar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection