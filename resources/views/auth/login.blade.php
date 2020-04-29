@extends('auth.layouts.layouts')
@section('contenido')
<div class="container">
        @if ($errors->any())
        <div class="alert danger">
            
        <span class="closebtn">&times;</span>
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="list-style: none">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<form class="formulario" action="{{route('login')}}" method="POST">
    <h1>Login</h1>
    <h2>Sistema de Inventario y Facturación</h2>
    <h3>Auto Repuestos El Triunfo</h3>
    <div class="contenedor">
        {!! csrf_field() !!}
        <div class="input-contenedor {{ $errors->has('email') ? ' has-error' : '' }}">
            <i class="fa fa-envelope icon"></i>
            <input type="text" name="email" id="email">
            <span data-placeholder="Email"></span>
        </div>
        <div class="input-contenedor2 {{ $errors->has('password') ? ' has-error' : '' }}">
            <i class="fa fa-key icon"></i>
            <input type="password" name="password" id="password">
            <span  data-placeholder="Password"></span>
            <span class="logbtn2" style="color: #999; cursor: pointer" onclick="showcont();" > <i class="fa fa-eye"></i></span>
        </div>
        <input type="submit" value="Login" class="button">
      
    </div>
</form>
@endsection