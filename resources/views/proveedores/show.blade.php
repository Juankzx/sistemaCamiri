@extends('adminlte::page')

@section('template_title')
    Proveedor
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles del Proveedor</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $proveedor->nombre }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="email">Correo Electrónico:</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $proveedor->email }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="ciudad">Ciudad:</label>
                            <input type="text" id="ciudad" name="ciudad" class="form-control" value="{{ $proveedor->ciudad }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="comuna">Comuna:</label>
                            <input type="text" id="comuna" name="comuna" class="form-control" value="{{ $proveedor->comuna }}" readonly>
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('proveedores.index') }}" class="btn btn-primary">Volver</a>
                        </div>
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

