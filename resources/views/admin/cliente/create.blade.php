@extends('admin.template.template')
@section('title','Crear Cliente')
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
    {!!Form::open(['route'=>'cliente.store','method'=>'POST','class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Crear Cliente<h1>
        </div>
        <div class="contenedor">
            <div class="input-contenedor input-60 input-100">
                <i class="fa fa-user icon" aria-hidden="true"></i>
                {!! Form::text('nombre', null, ['placeholder'=>'Nombre Cliente'])!!}
            </div>
    
            <div class="input-40 input-contenedor input-100">
                <i class="fa fa-id-card icon" aria-hidden="true"></i>
                {!! Form::text('cedula', null, ['placeholder'=>'Numero Cedula','pattern'=>'^([0-9]{3})[ -]([0-9]{6})[ -]([0-9|A-Z]{5})$','title'=>'El formato es: 000-000000-0000L','required'])!!}
            </div>
    
            <div class="input-contenedor input-100">
                <i class="material-icons icon">place</i>                        
                {!! Form::text('direccion', null, ['placeholder'=>'Direccion'])!!}
            </div>
    
            <div class="input-contenedor input-100">
                <i class="fa fa-phone icon" aria-hidden="true"></i>
                {!! Form::text('numero_telefono', null, ['placeholder'=>'Numero Telefono','pattern'=>'\[+][(0-9)]\{3}[0-9]{4}[ -][0-9]{4}','required'])!!}
            </div>
    
            <div class="input-contenedor input-100">
                <i class="fa fa-envelope icon" aria-hidden="true"></i>
                {!! Form::email('correo_electronico', null, ['placeholder'=>'Correo Electronico'])!!}
            </div>

            <div class="input-contenedor input-100">
                <i class="icon"><img src="{{asset('img/porciento.png')}}" alt=""></i>
                {!! Form::select('descuento_id', $descuentos, ['placeholder'=>'Seleccione una marca']) !!}
            </div>
            
            <button type="submit" class="button-primary"><i class="fa fa-save"></i> Guardar</button>
        </div>
    {!!Form::close()!!}
@endsection