@extends('admin.template.template')
@section('title','Crear Categoria')
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
    {!!Form::open(['route'=>'categorias.store','method'=>'POST','class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Crear Categoria<h1>
        </div>
        <div class="input-contenedor input-100">
            <i class="fa fa-pencil icon"></i>
            {!! Form::text('nombre_categoria', null, ['placeholder'=>'Nombre Categoria'])!!}
        </div>
        
        <button type="submit" class="button-primary"><i class="fa fa-save"></i> Guardar</button>
    {!!Form::close()!!}
@endsection
