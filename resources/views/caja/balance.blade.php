@extends('adminlte::page')

@section('content')
    <h1>Balance de Caja</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha Apertura</th>
                <th>Fecha Cierre</th>
                <th>Monto Apertura</th>
                <th>Monto Cierre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cajas as $caja)
                <tr>
                    <td>{{ $caja->id }}</td>
                    <td>{{ $caja->fecha_apertura }}</td>
                    <td>{{ $caja->fecha_cierre }}</td>
                    <td>{{ $caja->monto_apertura }}</td>
                    <td>{{ $caja->monto_cierre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection