<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idgrupoUsuario') }}
            {{ Form::text('idgrupoUsuario', $usuario->idgrupoUsuario, ['class' => 'form-control' . ($errors->has('idgrupoUsuario') ? ' is-invalid' : ''), 'placeholder' => 'Idgrupousuario']) }}
            {!! $errors->first('idgrupoUsuario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $usuario->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombreUsuario') }}
            {{ Form::text('nombreUsuario', $usuario->nombreUsuario, ['class' => 'form-control' . ($errors->has('nombreUsuario') ? ' is-invalid' : ''), 'placeholder' => 'Nombreusuario']) }}
            {!! $errors->first('nombreUsuario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contraseña') }}
            {{ Form::text('contraseña', $usuario->contraseña, ['class' => 'form-control' . ($errors->has('contraseña') ? ' is-invalid' : ''), 'placeholder' => 'Contraseña']) }}
            {!! $errors->first('contraseña', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nivelUsuario') }}
            {{ Form::text('nivelUsuario', $usuario->nivelUsuario, ['class' => 'form-control' . ($errors->has('nivelUsuario') ? ' is-invalid' : ''), 'placeholder' => 'Nivelusuario']) }}
            {!! $errors->first('nivelUsuario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $usuario->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>