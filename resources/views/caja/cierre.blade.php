@extends('adminlte::page')

@section('content')
    <h1>Cierre de Caja</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('caja.cerrar') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="monto_cierre">Monto de Cierre:</label>
            <input type="number" name="monto_cierre" class="form-control" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Cerrar Caja</button>
    </form>
@endsection