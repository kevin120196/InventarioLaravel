@extends('admin.template.template')
@section('title','Actualizar Categoria')
@section('contenido')
    {!!Form::open(['route'=>['categorias.update',$categoria],'method'=>'PUT','class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Actualizar Categoria<h1>
        </div>
        <div class="input-contenedor input-100">
            <i class="fa fa-pencil icon"></i>
            {!! Form::text('nombre_categoria', $categoria->nombre_categoria, ['placeholder'=>'Nombre Categoria','required'])!!}
        </div>

        <button type="submit" class="button-primary"><i class="fa fa-edit"></i> Editar</button>

    {!!Form::close()!!}
@endsection