@extends('admin.template.template')
@section('title','Editar Vendedor')
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
    {!!Form::open(['route'=>['vendedores.update',$vendedor],'method'=>'PUT','class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Editar Vendedor<h1>
        </div>
        <div class="contenedor">
            {{csrf_field()}}
            <div class="input-contenedor input-60 input-100">
                <i class="fa fa-user icon" aria-hidden="true"></i>
                {!! Form::text('nombre_vendedor', $vendedor->nombre_vendedor, ['placeholder'=>'Nombre Cliente'])!!}
            </div>
    
            <div class="input-40 input-contenedor input-100">
                <i class="fa fa-id-card icon" aria-hidden="true"></i>
                {!! Form::text('cedula_vendedor', $vendedor->cedula_vendedor, ['placeholder'=>'Numero Cedula','pattern'=>'^([0-9]{3})[ -]([0-9]{6})[ -]([0-9|A-Z]{5})$','title'=>'El formato es: 000-000000-0000L','required'])!!}
            </div>
    
            <div class="input-contenedor input-100">
                <i class="material-icons icon">place</i>                        
                {!! Form::text('direccion', $vendedor->direccion, ['placeholder'=>'Direccion'])!!}
            </div>
    
            <div class="input-contenedor input-100">
                <i class="fa fa-phone icon" aria-hidden="true"></i>
                {!! Form::text('telefono_vendedor', $vendedor->telefono_vendedor, ['placeholder'=>'Numero Telefono','pattern'=>'\[+][(0-9)]\{3}[0-9]{4}[ -][0-9]{4}','required'])!!}
            </div>
    
            <div class="input-contenedor input-100">
                <i class="fa fa-envelope icon" aria-hidden="true"></i>
                {!! Form::email('correo_electronico', $vendedor->correo_electronico, ['placeholder'=>'Correo Electronico'])!!}
            </div>
            
            <button type="submit" class="button-primary"><i class="fa fa-edit"></i> Actualizar</button>
        </div>
    {!!Form::close()!!}
@endsection