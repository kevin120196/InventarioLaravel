@extends('admin.template.template')
@section('title','Actualizar Categoria')
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
    {!!Form::open(['route'=>['categorias.update',$categoria],'method'=>'PUT','class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Actualizar Categoria<h1>
        </div>
        <div class="contenedor">
            {!! csrf_field() !!}
            <div class="input-contenedor input-100">
                <i class="fa fa-pencil icon"></i>
                {!! Form::text('nombre_categoria', $categoria->nombre_categoria, ['placeholder'=>'Nombre Categoria','required'])!!}
            </div>
    
            <button type="submit" class="button-primary"><i class="fa fa-edit"></i> Editar</button>    
        </div>
    {!!Form::close()!!}
@endsection