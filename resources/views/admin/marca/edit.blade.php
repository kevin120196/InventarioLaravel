@extends('admin.template.template')
@section('title','Actualizar Marca')
@section('contenido')
    {!!Form::open(['route'=>['marcas.update',$marca],'method'=>'PUT','class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Actualizar Marca<h1>
        </div>
        <div class="input-contenedor input-100">
            <i class="fa fa-pencil icon"></i>
            {!! Form::text('nombre_marca', $marca->nombre_marca, ['placeholder'=>'Nombre Marca','required'])!!}
        </div>

        <button type="submit" class="button-primary"><i class="fa fa-edit"></i> Editar</button>

    {!!Form::close()!!}
@endsection