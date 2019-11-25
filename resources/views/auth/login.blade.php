@extends('auth.layouts.layouts')
@section('contenido')

<form class="formulario" action="{{route('login')}}" method="POST">
<h1>Login</h1>
{{@csrf_field()}}
    <div class="contenedor">
        <div class="input-contenedor">
            <i class="fa fa-envelope icon"></i>
            <input type="text" name="email" id="email">
            <span data-placeholder="Email"></span>
        </div>
        <div class="input-contenedor2">
            <i class="fa fa-key icon"></i>
            <input type="password" name="password" id="password">
            <span  data-placeholder="Password"></span>
            <span class="logbtn2" style="color: #999;" onclick="showcont();"> <i class="fa fa-eye"></i></span>
        </div>
        <input type="submit" value="Login" class="button">
        <p>Al registrarte, aceptas nuestras condiciones de uso y politica de privacidad</p>
        <p>¿No tienes una cuenta?<a class="link" href="form.html">Registrate</a></p>
    </div>
</form>
@endsection