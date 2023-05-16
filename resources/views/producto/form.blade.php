<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idcategoria') }}
            {{ Form::select('idcategoria', $categorias, $producto->idcategoria, ['class' => 'form-control' . ($errors->has('idcategoria') ? ' is-invalid' : ''), 'placeholder' => 'Idcategoria']) }}
            {!! $errors->first('idcategoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $producto->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('precioCompra') }}
            {{ Form::text('precioCompra', $producto->precioCompra, ['class' => 'form-control' . ($errors->has('precioCompra') ? ' is-invalid' : ''), 'placeholder' => 'Preciocompra']) }}
            {!! $errors->first('precioCompra', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('precioVenta') }}
            {{ Form::text('precioVenta', $producto->precioVenta, ['class' => 'form-control' . ($errors->has('precioVenta') ? ' is-invalid' : ''), 'placeholder' => 'Precioventa']) }}
            {!! $errors->first('precioVenta', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>