@extends('admin.template.template')
@section('title','Editar Descuentos')
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
    {!!Form::open(['route'=>['descuentos.update',$descuento_cliente],'method'=>'PUT','class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Editar Descuentos<h1>
        </div>
        <div class="input-contenedor input-100">
            <i class="icon"><img src="{{asset('img/porciento.png')}}" alt=""></i>
            {!! Form::text('descuento_cliente', $descuento_cliente->descuento_cliente, ['placeholder'=>'Descuento'])!!}
        </div>
        
        <button type="submit" class="button-primary"><i class="fa fa-save"></i> Guardar</button>
    {!!Form::close()!!}
@endsection
