<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('grupoNombre') }}
            {{ Form::text('grupoNombre', $grupoUsuario->grupoNombre, ['class' => 'form-control' . ($errors->has('grupoNombre') ? ' is-invalid' : ''), 'placeholder' => 'Gruponombre']) }}
            {!! $errors->first('grupoNombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('grupoNivel') }}
            {{ Form::text('grupoNivel', $grupoUsuario->grupoNivel, ['class' => 'form-control' . ($errors->has('grupoNivel') ? ' is-invalid' : ''), 'placeholder' => 'Gruponivel']) }}
            {!! $errors->first('grupoNivel', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('grupoEstado') }}
            {{ Form::text('grupoEstado', $grupoUsuario->grupoEstado, ['class' => 'form-control' . ($errors->has('grupoEstado') ? ' is-invalid' : ''), 'placeholder' => 'Grupoestado']) }}
            {!! $errors->first('grupoEstado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>