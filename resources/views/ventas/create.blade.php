@extends('adminlte::page')

@section('template_title')
    {{ __('Crear') }} Venta
@endsection

@section('content')
    <h1>Nueva Venta</h1>

    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="producto_id">Producto</label>
            <select name="producto_id" id="producto_id" class="form-control">
                <option value="">Selecciona un producto</option>
                @foreach ($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="user_id">Usuario</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Seleccione un usuario</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        

        <div class="form-group">
            <label for="proveedor_id">Proveedor</label>
            <select name="proveedor_id" id="proveedor_id" class="form-control" required>
                <option value="">Seleccione un proveedor</option>
                @if(isset($proveedores))
                @foreach ($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="metodo_pago">Método de Pago</label>
            <input type="text" name="metodo_pago" id="metodo_pago" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection

@section('js')
    <script>
        @if ($errors->any())
            window.addEventListener('DOMContentLoaded', () => {
                const errorMessage = '{{ $errors->first() }}';
                alert(errorMessage);
            });
        @endif
    </script>
@stop
@section('css')
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stop

