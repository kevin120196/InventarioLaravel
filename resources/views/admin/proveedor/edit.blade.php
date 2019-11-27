@extends('admin.template.template')
@section('title','Actualizar Proveedor')
@section('contenido')
    {!!Form::open(['route'=>['proveedores.update',$proveedor],'method'=>'PUT','class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Actualizar Proveedor<h1>
        </div>
        <div class="input-contenedor input-100">
            <i class="fa fa-user icon" aria-hidden="true"></i>
            {!! Form::text('nombre_proveedor', $proveedor->nombre_proveedor, ['placeholder'=>'Nombre Proveedor'])!!}
        </div>

        <div class="input-contenedor input-100">
            <i class="fa fa-id-card icon" aria-hidden="true"></i>
            {!! Form::text('cedula', $proveedor->cedula, ['placeholder'=>'Numero Cedula','pattern'=>'^([0-9]{3})[ -]([0-9]{6})[ -]([0-9|A-Z]{5})$','title'=>'El formato es: 000-000000-0000L','required'])!!}
        </div>

        <div class="input-contenedor input-100">
            <i class="material-icons icon">place</i>                        
            {!! Form::text('direccion_proveedor', $proveedor->direccion_proveedor, ['placeholder'=>'Direccion'])!!}
        </div>

        <div class="input-contenedor input-100">
            <i class="fa fa-phone icon" aria-hidden="true"></i>
            {!! Form::text('numero_telefono_proveedor', $proveedor->numero_telefono_proveedor, ['placeholder'=>'Numero Telefono','pattern'=>'\[+][(0-9)]\{3}[0-9]{4}[ -][0-9]{4}','required'])!!}
        </div>

        <div class="input-contenedor input-100">
            <i class="fa fa-envelope icon" aria-hidden="true"></i>
            {!! Form::text('correo_electronico_proveedor',$proveedor->correo_electronico_proveedor, ['placeholder'=>'Correo Electronico'])!!}
        </div>
        
        <button type="submit" class="button-primary"><i class="fa fa-edit"></i> Actualizar</button>
    {!!Form::close()!!}
@endsection