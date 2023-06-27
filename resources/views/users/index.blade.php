@extends('adminlte::page')

@section('template_title')
    Usuario
@endsection

@section('content')
    <h1>Lista de Usuarios</h1>

    <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Crear Usuario</a>

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
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
                        <!-- Agrega aquí el botón para eliminar -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
