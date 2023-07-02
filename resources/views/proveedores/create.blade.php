@extends('adminlte::page')

@section('template_title')
    {{ __('Crear') }} Proveedor
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Proveedor</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('proveedores.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="direccion" id="direccion" name="direccion" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="telefono" id="telefono" name="telefono" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" id="email" name="correo_electronico" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="ciudad">Ciudad</label>
                                <input type="text" id="ciudad" name="ciudad" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="comuna">Comuna</label>
                                <input type="text" id="comuna" name="comuna" class="form-control" required>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Crear</button>
                                <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stop
