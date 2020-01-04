@extends('admin.template.template')
@section('title','Edicion de Usuarios')
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
{!!Form::open(['route'=>['usuarios.update',$user],'method'=>'PUT','class'=>'formulario'])!!}
    <div class="cabeceraForm">
        <h1>Editar Usuario<h1>
    </div>
    <div class="contenedor">
        {!! csrf_field() !!}
        <div class="input-contenedor input-100">
            <i class="fa fa-user icon"></i>
            {!! Form::text('name', $user->name, ['placeholder'=>'Nombre de Usuario'])!!}
        </div>
    
        <div class="input-contenedor input-100">
                <i class="fa fa-envelope icon"></i>
                {!! Form::text('email', $user->email, ['placeholder'=>'Correo Electronio'])!!}
        </div>
    
        <div class="input-contenedor input-100">
                    <i class="fa fa-user-plus icon"></i>
                    {!! Form::select('user_type',['Gerente'=>'Gerente','Venta'=>'Venta','Bodega'=>'Bodega'],$user->user_type, ['placeholder'=>'Tipo de Usuario','required'])!!}
        </div>
    
        <button type="submit" class="button-primary"><i class="fa fa-edit"></i> Editar</button>
    </div>
    
{!!Form::close()!!}
@endsection