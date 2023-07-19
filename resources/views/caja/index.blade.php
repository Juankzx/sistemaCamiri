@extends('adminlte::page')

@section('content')
    <h1>Cajas</h1>
    <div class="row mb-3">
        <div class="col-md-4">
          <form action="{{ route('cajas.index') }}" method="GET">
            <div class="input-group">
              <input type="date" name="fecha_inicio" class="form-control" placeholder="Fecha inicio">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Buscar</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-4">
          <form action="{{ route('cajas.index') }}" method="GET">
            <div class="input-group">
              <input type="date" name="fecha_cierre" class="form-control" placeholder="Fecha cierre">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Buscar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
     <div> 
    <a href="{{ route('cajas.create') }}" class="btn btn-primary">Abrir Caja</a>
  </div>
  <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha Apertura</th>
                <th>Fecha Cierre</th>
                <th>Monto Apertura</th>
                <th>Monto Cierre</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cajas as $caja)
                <tr>
                    <td>{{ $caja->id }}</td>
                    <td>{{ $caja->fecha_apertura }}</td>
                    <td>{{ $caja->fecha_cierre }}</td>
                    <td>${{ $caja->monto_apertura }}</td>
                    <td>${{ $caja->monto_cierre }}</td>
                    <td>{{ $caja->user->name ?? '' }}</td>   
                    <td>
                        <span class="right badge badge-{{ $caja->cerrada ? 'danger' : 'success' }}">{{$caja->cerrada ? 'Cerrada' : 'Abierta'}}</span><!-- Estado de la caja -->
                    </td>
                    <td>
                      @if($caja->cerrada)
                          <!-- La caja está cerrada -->
                          <span class="text-muted"><a href="{{ route('cajas.show', $caja->id) }}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-eye"></i></a></span>
                      @else
                          <!-- La caja está abierta -->
                          <a href="{{ route('cajas.apertura', $caja) }}" class="btn btn-primary">Abrir</a>
                          <a href="{{ route('cajas.cierre', $caja) }}" class="btn btn-danger">Cerrar</a>
                      @endif
                  </td>
                  <td>
                    @if($caja->cerrada)
                        <!-- Mostrar el enlace solo si la caja está abierta -->
                        
                    @endif
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection