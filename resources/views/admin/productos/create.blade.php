@extends('admin.template.template')
@section('title','Crear Productos')
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
    <div class="row">
        
        {!!Form::open(['route'=>'productos.store','method'=>'POST','class'=>'formulario'])!!}

        <div class="cabeceraForm">
            <h1>Nuevo Producto</h1>
        </div>

        <div class="contenedor">
            <div class="input-contenedor input-50 input-100">
                <i class=" fa fa-barcode icon"></i>
                {!! Form::text('codigo_original', null, ['placeholder'=>'Codigo original']) !!}
            </div>
            <div class="input-contenedor input-50 input-100">
                <i class=" fa fa-barcode icon"></i>
                {!! Form::text('codigo_alterno', null, ['placeholder'=>'Codigo alterno']) !!}
            </div>
    
    
            <div class="input-contenedor input-50 input-100">
                <i class="icon"><img src="{{asset('img/cantidad (4).png')}}"></i>
                {!! Form::number('cantidad', null, ['placeholder'=>'Cantidad']) !!}
            </div>
    
            <div class="input-contenedor input-50 input-100">
                <i class="fa fa-money icon"></i>
                {!! Form::text('precio_compra', null, ['placeholder'=>'Precio Compra']) !!}
            </div>
    
            <div class="input-contenedor input-50 input-100">
                <i class="material-icons icon">attach_money </i>
                {!! Form::text('precio_venta', null, ['placeholder'=>'Precio Venta']) !!}
            </div>
            <div class="input-contenedor input-50 input-100">
                <i class="fa fa-user-plus icon"></i>
                {!! Form::text('aplicacion', null, ['placeholder'=>'Aplicacion']) !!}
            </div>
    
            <div class="input-contenedor input-100">
                <i class="icon"><img src="{{asset('img/descrip.png')}}"></i>
                {!! Form::textarea('descripcion', null, ['placeholder'=>'Descripción']) !!}
            </div>

            <div class="input-contenedor input-100">
                <i class="icon"><img src="{{asset('img/transporte.png')}}" alt=""></i>
                {!! Form::text('unidad_medida', null, ['placeholder'=>'unidad de medida']) !!}
            </div>

            <div class="input-contenedor input-100">
                <i class="icon"><img src="{{asset('img/Estante.png')}}" alt=""></i>
                {!! Form::text('numero_rack', null, ['placeholder'=>'numero rack o estante']) !!}
            </div>
    
            <div class="input-contenedor input-100">
                <i class="icon"><img src="{{asset('img/repues.png')}}" alt=""></i>
                {!! Form::select('marca_id', $marcas, ['placeholder'=>'Seleccione una marca']) !!}
            </div>

            <div class="input-contenedor input-100">
                <i class="icon"><img src="{{asset('img/categoria (2).png')}}"></i>
                {!! Form::select('categoria_id', $categoria, ['placeholder'=>'Seleccione una categoria']) !!}
            </div>
    
            <div class="input-contenedor input-100">
                <i class="icon"><img src="{{asset('img/inventario (3).png')}}"></i>
                {!! Form::select('proveedor_id', $proveedores, ['placeholder'=>'Seleccione un proveedor','id'=>"proveedor_id"]) !!}
            </div>

            <button type="submit" class="button-primary"><i class="fa fa-save"></i> Guardar</button>
        </div>
        

    {!! Form::close() !!}

    </div>
@endsection