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

    @if ($caja)
        <div>
            <h2>Detalle de Ventas:</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Venta</th>
                        <th>Fecha</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ventas as $venta)
                        <tr>
                            <td>{{ $venta->id }}</td>
                            <td>{{ $venta->created_at }}</td>
                            <td>${{ $venta->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2>Total de Ventas:</h2>
            <p>Total: ${{ $totalVentas }}</p>

            <form action="{{ route('cajas.cerrar') }}" method="POST" id="cerrar-caja-form">
                @csrf
                <input type="hidden" name="caja_id" value="{{ $caja->id }}">
                <div class="form-group">
                    <label for="monto_cierre">Monto de Cierre:</label>
                    <input type="number" name="monto_cierre" class="form-control" step="0.01" value="{{ $totalVentas }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Cerrar Caja</button>
            </form>
        </div>
    @else
        <div class="alert alert-danger">
            La caja no existe.
        </div>
    @endif

    <script>
        document.getElementById('cerrar-caja-form').addEventListener('submit', function(event) {
            var confirmacion = confirm('¿Estás seguro de cerrar la caja?');
            if (!confirmacion) {
                event.preventDefault();
            } else {
                window.location.href = "{{ route('cajas.index') }}";
            }
        });
    </script>
@endsection
