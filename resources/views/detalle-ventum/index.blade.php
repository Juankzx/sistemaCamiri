@extends('adminlte::page')

@section('template_title')
    Detalle Ventum
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Detalle Ventum') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('detalle-venta.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Idproducto</th>
										<th>Idventa</th>
										<th>Cantidad</th>
										<th>Precio</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detalleVenta as $detalleVentum)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $detalleVentum->idproducto }}</td>
											<td>{{ $detalleVentum->idventa }}</td>
											<td>{{ $detalleVentum->cantidad }}</td>
											<td>{{ $detalleVentum->precio }}</td>

                                            <td>
                                                <form action="{{ route('detalle-venta.destroy',$detalleVentum->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('detalle-venta.show',$detalleVentum->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('detalle-venta.edit',$detalleVentum->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $detalleVenta->links() !!}
            </div>
        </div>
    </div>
@endsection
