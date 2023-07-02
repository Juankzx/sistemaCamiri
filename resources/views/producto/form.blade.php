<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Escribe el nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('categoria') }}
            {{ Form::select('categoria_id', $categorias, $producto->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona la categoria']) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::number('cantidad', $producto->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa la cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Precio compra') }}
            {{ Form::text('precioCompra', $producto->precioCompra, ['class' => 'form-control' . ($errors->has('precioCompra') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa el precio de compra']) }}
            {!! $errors->first('precioCompra', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Precio venta') }}
            {{ Form::text('precioVenta', $producto->precioVenta, ['class' => 'form-control' . ($errors->has('precioVenta') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa el precio de venta']) }}
            {!! $errors->first('precioVenta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control @error('estado') is-invalid @enderror" id="estado">
                <option value="1" {{ old('estado') === 1 ? 'selected' : ''}}>Activo</option>
                <option value="0" {{ old('estado') === 0 ? 'selected' : ''}}>Inactivo</option>
            </select>
            @error('estado')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>