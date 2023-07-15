@extends('adminlte::page')

@section('content')
    <h1>Apertura de Caja</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('caja.apertura') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="monto_apertura">Monto de Apertura:</label>
            <input type="number" name="monto_apertura" class="form-control" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Abrir Caja</button>
    </form>
@endsection