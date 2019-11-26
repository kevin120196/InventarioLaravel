@extends('auth.layouts.layouts')

@section('contenido')
<form class="formulario" action="{{ route('register')}}" method="POST">
    <h1>Registrate</h1>
    {{ csrf_field() }}
    <div class="contenedor">
        <div class="input-contenedor {{ $errors->has('name') ? ' has-error' : '' }}">
            <i class="fa fa-user icon"></i>
            <input id="name" name="name" value="{{old('name')}}" type="text" placeholder="Nombre Completo" required autofocus>

            @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
        <div class="input-contenedor {{ $errors->has('email') ? ' has-error' : '' }}">
            <i class="fa fa-envelope icon"></i>
            <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Correo Electronico" required>
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <div class="input-contenedor {{ $errors->has('password') ? ' has-error' : '' }}">
            <i class="fa fa-key icon"></i>
            <input id="password" name="password" type="password" placeholder="Contraseña" required>
            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>

        <div class="input-contenedor {{ $errors->has('password') ? ' has-error' : '' }}">
            <i class="fa fa-key icon"></i>
            <input id="password-confirm" name="password_confirmation" type="password" placeholder="Confirmar Contraseña" required>
        </div>
        <input type="submit" value="Registrate" class="button">
        <p>Al registrarte, aceptas nuestras condiciones de uso y politica de privacidad</p>
        <p>¿Ya tienes una cuenta?<a class="link" href="{{route('login')}}">Iniciar Sesion</a></p>
    </div>
</form>
@endsection
