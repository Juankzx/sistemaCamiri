@extends('adminlte::page')

@section('content')
    <h1>Abrir Caja</h1>
    <form action="{{ route('cajas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="monto_apertura">Monto Apertura</label>
            <input type="text" name="monto_apertura" id="monto_apertura" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Abrir Caja</button>
    </form>
@endsection