@extends('admin.template.template')
@section('title','Crear Compra')
@section('contenido')
    {!!Form::open(['route'=>'ventas.index','Method'=>'POST'],['class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Factura Venta<h1>
        </div>
        <div class="contenedor">
            <div class="input-contenedor input-50 input-100">
                <i class="icon"><img src="{{asset('img/compras (2).png')}}" alt=""></i>
                {!! Form::text('vendedores_id', $venta->vendedores->nombre_vendedor, ['placeholder'=>'Proveedores','id'=>"estado_factura",'readOnly'])!!}
            </div>

            <div class="input-contenedor input-50 input-100">
                <i class="fa fa-calendar icon" aria-hidden="true"></i>
                {!! Form::text('fecha_factura', $venta->fecha_factura, ['placeholder'=>'Fecha','id'=>"fecha",'readOnly'])!!}
            </div>

            <div class="input-contenedor input-50 input-100">
                    <i class="icon"><img src="{{asset('img/factura (1).png')}}" alt=""></i>                
                    {!! Form::text('estado_factura', $venta->estado_factura, ['placeholder'=>'Estado Factura','id'=>"estado_factura",'readOnly'])!!}
            </div>

            <div class="input-contenedor input-50 input-100">
                <i class="icon"><img src="{{asset('img/factur.png')}}" alt=""></i>
                {!! Form::text('tipo_factura_id', $venta->tipos_factura->tipo_factura_nombre, ['placeholder'=>'Estado Factura','id'=>"estado_factura",'readOnly'])!!}
            </div>

            <div class="input-contenedor input-100">
                        
                    {!! Form::text('clientes_id', $venta->clientes->nombre, ['placeholder'=>'Proveedores','id'=>"estado_factura",'readOnly'])!!}
            </div>

            

        </div>
        <div class="main-container">
            <table id="venta" class="detalleVenta">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>precio</th>
                        <th>SubTotal</th>
                        <th>Descuento</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($detalle as $detalles)
                        <tr>
                            <td>{{$detalles->marca_id}}</td>
                            <td>{{$detalles->cantidad}}</td>
                            <td>{{$detalles->precio}}</td>
                            <td>{{$venta->descuentos_clientes->descuento_cliente}}</td>
                            <td>{{$detalles->total}}</td>
                            
                        </tr>
                       
                    @endforeach
                </tbody>
                <tfoot style="background: #aaa">
                    <tr>
                        <th><b>Total:</b> {{$venta->totalgeneral}}</th>
                    </tr>
                </tfoot>
            </table>
            <a href="{{route('ventas.index')}}" class="button-primary">
                <i class="fa fa-undo"></i>
            </a>
    </div>
    {!!Form::close()!!}
@endsection
