@extends('admin.template.template')
@section('title','Crear Productos')
@section('contenido')
    <div class="row">
        
        {!!Form::open(['route'=>['productos.update',$producto],'method'=>'PUT','class'=>'formulario'])!!}

        <div class="cabeceraForm">
            <h1>Actualizar Producto</h1>
        </div>

        <div class="contenedor">
            <div class="input-contenedor input-50 input-100">
                <i class=" fa fa-barcode icon"></i>
                {!! Form::text('codigo_original', $producto->codigo_original, ['placeholder'=>'Codigo original']) !!}
            </div>
            <div class="input-contenedor input-50 input-100">
                <i class=" fa fa-barcode icon"></i>
                {!! Form::text('codigo_alterno', $producto->codigo_alterno, ['placeholder'=>'Codigo alterno']) !!}
            </div>
    
    
            <div class="input-contenedor input-50 input-100">
                <i class="icon"><img src="{{asset('img/cantidad (4).png')}}"></i>
                {!! Form::number('cantidad',$producto->cantidad, ['placeholder'=>'Cantidad']) !!}
            </div>
    
            <div class="input-contenedor input-50 input-100">
                <i class="fa fa-money icon"></i>
                {!! Form::text('precio_compra', $producto->precio_compra, ['placeholder'=>'Precio Compra']) !!}
            </div>
    
            <div class="input-contenedor input-50 input-100">
                <i class="material-icons icon">attach_money </i>
                {!! Form::text('precio_venta', $producto->precio_venta, ['placeholder'=>'Precio Venta']) !!}
            </div>
    
            <div class="input-contenedor input-50 input-100">
                <i class="fa fa-user-plus icon"></i>
                {!! Form::text('aplicacion', $producto->aplicacion, ['placeholder'=>'Aplicacion']) !!}
            </div>
    
            <div class="input-contenedor input-100">
                <i class="icon"><img src="{{asset('img/descrip.png')}}"></i>
                {!! Form::textarea('descripcion', $producto->descripcion, ['placeholder'=>'Descripción']) !!}
            </div>

            <div class="input-contenedor input-100">
                <i class="icon"><img src="{{asset('img/transporte.png')}}" alt=""></i>
                {!! Form::text('unidad_medida', $producto->unidad_medida, ['placeholder'=>'unidad de medida']) !!}
            </div>

            <div class="input-contenedor input-100">
                <i class="icon"><img src="{{asset('img/Estante.png')}}" alt=""></i>
                {!! Form::text('numero_rack', $producto->numero_rack, ['placeholder'=>'numero rack o estante']) !!}
            </div>
    
            <div class="input-contenedor input-100">
                <i class="icon"><img src="{{asset('img/repues.png')}}" alt=""></i>
                {!! Form::select('marca_id', $marcas,$producto->marca->id) !!}
            </div>

            <div class="input-contenedor input-100">
                <i class="icon"><img src="{{asset('img/categoria (2).png')}}"></i>
                {!! Form::select('categoria_id', $categoria,$producto->categoria->id) !!}
            </div>
    
            <div class="input-contenedor input-100">
                <i class="icon"><img src="{{asset('img/inventario (3).png')}}"></i>
                {!! Form::select('proveedor_id', $proveedores,$producto->proveedor->id) !!}
            </div>

            <button type="submit" class="button-primary"><i class="fa fa-edit"></i> Actualizar</button>
        </div>
        

    {!! Form::close() !!}

    </div>
@endsection