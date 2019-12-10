@extends('admin.template.template')
@section('title','Crear Vendedor')
@section('contenido')
    {!!Form::open(['route'=>'vendedores.store','method'=>'POST','class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Crear Vendedor<h1>
        </div>
        <div class="contenedor">
            {{csrf_field()}}
            <div class="input-contenedor input-60 input-100">
                <i class="fa fa-user icon" aria-hidden="true"></i>
                {!! Form::text('nombre_vendedor', null, ['placeholder'=>'Nombre Vendedor'])!!}
            </div>
    
            <div class="input-40 input-contenedor input-100">
                <i class="fa fa-id-card icon" aria-hidden="true"></i>
                {!! Form::text('cedula_vendedor', null, ['placeholder'=>'Numero Cedula','pattern'=>'^([0-9]{3})[ -]([0-9]{6})[ -]([0-9|A-Z]{5})$','title'=>'El formato es: 000-000000-0000L','required'])!!}
            </div>
    
            <div class="input-contenedor input-100">
                <i class="material-icons icon">place</i>                        
                {!! Form::text('direccion', null, ['placeholder'=>'Direccion'])!!}
            </div>
    
            <div class="input-contenedor input-100">
                <i class="fa fa-phone icon" aria-hidden="true"></i>
                {!! Form::text('telefono_vendedor', null, ['placeholder'=>'Numero Telefono','pattern'=>'\[+][(0-9)]\{3}[0-9]{4}[ -][0-9]{4}','required'])!!}
            </div>
    
            <div class="input-contenedor input-100">
                <i class="fa fa-envelope icon" aria-hidden="true"></i>
                {!! Form::email('correo_electronico', null, ['placeholder'=>'Correo Electronico'])!!}
            </div>
            
            <button type="submit" class="button-primary"><i class="fa fa-save"></i> Guardar</button>
        </div>
    {!!Form::close()!!}
@endsection