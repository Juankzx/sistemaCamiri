<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Fecha') }}
            {{ Form::text('fecha', $venta->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'aaaa-mm-dd hh:mm:ss']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Metodo de Pago') }}
            {{ Form::text('metodoPago', $venta->metodoPago, ['class' => 'form-control' . ($errors->has('metodoPago') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el Metodo de Pago']) }}
            {!! $errors->first('metodoPago', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>