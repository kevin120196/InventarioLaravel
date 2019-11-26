@extends('admin.template.template')
@section('title','Registro de Usuarios')
@section('contenido')
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

{!!Form::open(['route'=>'usuarios.store','method'=>'POST','class'=>'formulario'])!!}
    <div class="cabeceraForm">
        <h1>Crear Usuario<h1>
    </div>
    <div class="input-contenedor input-100">
        <i class="fa fa-user icon"></i>
        {!! Form::text('name', null, ['placeholder'=>'Nombre de Usuario'])!!}
    </div>

    <div class="input-contenedor input-100">
            <i class="fa fa-envelope icon"></i>
            {!! Form::text('email', null, ['placeholder'=>'Correo Electronio'])!!}
    </div>

    <div class="input-contenedor input-100">
                <i class="fa fa-user-plus icon"></i>
                {!! Form::select('user_type',['Gerente'=>'Gerente','Venta'=>'Venta','Bodega'=>'Bodega'],null, ['placeholder'=>'Tipo de Usuario','required'])!!}
    </div>

    <div class="input-contenedor input-100">
            <i class="fa fa-key icon"></i>
			{!! Form::password('password',['required','placeholder'=>'Contraseña']) !!}
    </div>



    <button type="submit" class="button-primary"><i class="fa fa-save"></i> Guardar</button>
{!!Form::close()!!}
@endsection