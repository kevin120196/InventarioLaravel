@extends('admin.template.template')
@section('title','Crear Marca')
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
    {!!Form::open(['route'=>'marcas.store','method'=>'POST','class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Crear Marca<h1>
        </div>
        <div class="input-contenedor input-100">
            <i class="fa fa-pencil icon"></i>
            {!! Form::text('nombre_marca', null, ['placeholder'=>'Nombre Marca'])!!}
        </div>
        
        <button type="submit" class="button-primary"><i class="fa fa-save"></i> Guardar</button>
    {!!Form::close()!!}
@endsection