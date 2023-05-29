<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Producto') }}
            {{ Form::select('idproducto', $productos, $detalleventa->idproducto, ['class' => 'form-control' . ($errors->has('idproducto') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un Producto']) }}
            {!! $errors->first('idproducto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ID Venta') }}
            {{ Form::select('idventa', $ventas, $detalleventa->idventa, ['class' => 'form-control' . ($errors->has('idventa') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese un ID']) }}
            {!! $errors->first('idventa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $detalleventa->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese la Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::text('precio', $detalleventa->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>