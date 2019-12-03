@extends('admin.template.template')
@section('title','Crear Descuentos')
@section('contenido')
    {!!Form::open(['route'=>'descuentos.store','method'=>'POST','class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Crear Descuento<h1>
        </div>
        <div class="input-contenedor input-100">
            <i class="icon"><img src="{{asset('img/porciento.png')}}" alt=""></i>
            {!! Form::text('descuento_cliente', null, ['placeholder'=>'Descuento'])!!}
        </div>
        
        <button type="submit" class="button-primary"><i class="fa fa-save"></i> Guardar</button>
    {!!Form::close()!!}
@endsection
