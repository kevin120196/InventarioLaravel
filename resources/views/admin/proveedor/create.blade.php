@extends('admin.template.template')
@section('title','Crear Proveedor')
@section('contenido')
    {!!Form::open(['route'=>'proveedores.store','method'=>'POST','class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Crear Proveedor<h1>
        </div>
        <div class="input-contenedor input-100">
            <i class="fa fa-user icon" aria-hidden="true"></i>
            {!! Form::text, null, ['placeholder'=>'Nombre Proveedor'])!!}
        </div>

        <div class="input-contenedor input-100">
            <i class="fa fa-id-card icon" aria-hidden="true"></i>
            {!! Form::text('cedula', null, ['placeholder'=>'Numero Cedula'])!!}
        </div>

        <div class="input-contenedor input-100">
            <i class="material-icons icon">place</i>                        
            {!! Form::text('direccion_proveedor', null, ['placeholder'=>'Direccion'])!!}
        </div>

        <div class="input-contenedor input-100">
            <i class="fa fa-phone icon" aria-hidden="true"></i>
            {!! Form::text('numero_telefono_proveedor', null, ['placeholder'=>'Numero Telefono'])!!}
        </div>

        <div class="input-contenedor input-100">
            <i class="fa fa-envelope icon" aria-hidden="true"></i>
            {!! Form::text('correo_electronico_proveedor', null, ['placeholder'=>'Correo Electronico'])!!}
        </div>
        
        <button type="submit" class="button-primary"><i class="fa fa-save"></i> Guardar</button>
    {!!Form::close()!!}
@endsection