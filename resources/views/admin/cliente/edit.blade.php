@extends('admin.template.template')
@section('title','Crear Proveedor')
@section('contenido')
    {!!Form::open(['route'=>['cliente.update',$cliente],'method'=>'PUT','class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Crear Cliente<h1>
        </div>
        <div class="contenedor">
            <div class="input-contenedor input-60 input-100">
                <i class="fa fa-user icon" aria-hidden="true"></i>
                {!! Form::text('nombre', $cliente->nombre, ['placeholder'=>'Nombre Cliente'])!!}
            </div>
    
            <div class="input-40 input-contenedor input-100">
                <i class="fa fa-id-card icon" aria-hidden="true"></i>
                {!! Form::text('cedula', $cliente->cedula, ['placeholder'=>'Numero Cedula','pattern'=>'^([0-9]{3})[ -]([0-9]{6})[ -]([0-9|A-Z]{5})$','title'=>'El formato es: 000-000000-0000L','required'])!!}
            </div>
    
            <div class="input-contenedor input-100">
                <i class="material-icons icon">place</i>                        
                {!! Form::text('direccion', $cliente->direccion, ['placeholder'=>'Direccion'])!!}
            </div>
    
            <div class="input-contenedor input-100">
                <i class="fa fa-phone icon" aria-hidden="true"></i>
                {!! Form::text('numero_telefono', $cliente->numero_telefono, ['placeholder'=>'Numero Telefono','pattern'=>'\[+][(0-9)]\{3}[0-9]{4}[ -][0-9]{4}','required'])!!}
            </div>
    
            <div class="input-contenedor input-100">
                <i class="fa fa-envelope icon" aria-hidden="true"></i>
                {!! Form::text('correo_electronico', $cliente->correo_electronico, ['placeholder'=>'Correo Electronico'])!!}
            </div>

            <div class="input-contenedor input-100">
                <i class="fa fa-user-plus icon"></i>
                {!! Form::select('descuento_id', $descuentos,$cliente->descuento_id) !!}
            </div>
            
            <button type="submit" class="button-primary"><i class="fa fa-save"></i> Guardar</button>
        </div>
    {!!Form::close()!!}
@endsection