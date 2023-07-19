@extends('adminlte::page')

@section('template_title')
    Proveedor
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Proveedores</h3>
                        <a href="{{ route('proveedores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                            {{ __('+ AGREGAR') }}
                          </a>
                    </div>
                    <div class="card-body">
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Correo Electrónico</th>
                                    <th>Ciudad</th>
                                    <th>Comuna</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proveedores as $proveedor)
                                    <tr>
                                        <td>{{ $proveedor->id }}</td>
                                        <td>{{ $proveedor->nombre }}</td>
                                        <td>{{ $proveedor->direccion }}</td>
                                        <td>{{ $proveedor->telefono }}</td>
                                        <td>{{ $proveedor->correo_electronico }}</td>
                                        <td>{{ $proveedor->ciudad }}</td>
                                        <td>{{ $proveedor->comuna }}</td>
                                        <td>
                                                <a class="btn btn-sm btn-success" href="{{ route('proveedores.edit',$proveedor->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __() }}</a>
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __() }}</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

