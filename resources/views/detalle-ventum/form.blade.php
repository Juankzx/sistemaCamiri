<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idproducto') }}
            {{ Form::text('idproducto', $detalleVentum->idproducto, ['class' => 'form-control' . ($errors->has('idproducto') ? ' is-invalid' : ''), 'placeholder' => 'Idproducto']) }}
            {!! $errors->first('idproducto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idventa') }}
            {{ Form::text('idventa', $detalleVentum->idventa, ['class' => 'form-control' . ($errors->has('idventa') ? ' is-invalid' : ''), 'placeholder' => 'Idventa']) }}
            {!! $errors->first('idventa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $detalleVentum->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::text('precio', $detalleVentum->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>