@extends('adminlte::page')

@section('content')
    <h1>Cerrar Caja</h1>

    <form action="{{ route('cajas.cerrar', $caja->id) }}" method="POST" id="cerrar-caja-form">
        @csrf
        <input type="hidden" name="monto_cierre" value="{{ $totalVentas }}">
        <button type="submit" class="btn btn-primary">Confirmar Cierre de Caja</button>
    </form>
    
    <script>
        document.getElementById('cerrar-caja-form').addEventListener('submit', function(event) {
            var confirmacion = confirm('¿Estás seguro de cerrar la caja?');
            if (!confirmacion) {
                event.preventDefault();
            }
        });
    </script>
@endsection