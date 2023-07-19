@extends('adminlte::page')

@section('template_title')
    Usuario
@endsection

@section('content')
<div class="card-header">
    <div style="display: flex; justify-content: space-between; align-items: center;">

        <span id="card_title">
            <h1>Listado de Usuarios</h1>
        </span>

         <div class="float-right">
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
              {{ __('+ AGREGAR') }}
            </a>
          </div>
    </div>
</div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-edit"></i></a>
                        <!-- Agrega aquí el botón para eliminar -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
