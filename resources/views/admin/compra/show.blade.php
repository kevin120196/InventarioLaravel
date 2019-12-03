@extends('admin.template.template')
@section('title','Detalle Compra')
@section('contenido')
{!!Form::open(['route'=>'compra.index','Method'=>'POST'],['class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Factura Compra<h1>
        </div>
        <div class="contenedor">
            <div class="input-contenedor input-50 input-100">
                <i class="fa fa-calendar icon" aria-hidden="true"></i>
                {!! Form::text('fecha_compra', $facturacompra->fecha_compra, ['placeholder'=>'Fecha','id'=>"fecha",'readOnly'])!!}
            </div>

            <div class="input-contenedor input-50 input-100">
                <i class="icon"><img src="{{asset('img/factur.png')}}" alt=""></i>
                    {!! Form::text('estado_factura', $facturacompra->estado_factura, ['placeholder'=>'Estado Factura','id'=>"estado_factura",'readOnly'])!!}
            </div>

            <div class="input-contenedor input-50 input-100">
                <i class="icon"><img src="{{asset('img/factura (3).png')}}" alt=""></i>                
  
                    {!! Form::text('tipo_factura_id', $facturacompra->tipoFactura->tipo_factura_nombre, ['placeholder'=>'Estado Factura','id'=>"estado_factura",'readOnly'])!!}
            </div>

            <div class="input-contenedor input-50 input-100">
                <i class="icon"><img src="{{asset('img/proveedo.png')}}" alt=""></i>
                {!! Form::text('proveedores_id', $facturacompra->proveedores->nombre_proveedor, ['placeholder'=>'Proveedores','id'=>"estado_factura",'readOnly'])!!}
            </div>

            

        </div>
        <div class="main-container">
            <table id="venta" class="detallefact">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>precio</th>
                        <th>SubTotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalleFact as $detalle)
                        <tr>
                            <td>{{$detalle->productos_id_productos}}</td>
                            <td>{{$detalle->cantidad}}</td>
                            <td>{{$detalle->precio}}</td>
                            <td>{{$detalle->total}}</td>
                        </tr>
                       
                    @endforeach
                </tbody>
                <tfoot style="background: #aaa">
                    
                    <tr>
                        <th><b>Total: </b>{{$facturacompra->totalgeneral}}</th>
                    </tr>
                </tfoot>
            </table>
            <a href="{{route('compra.index')}}" class="button-primary">
                <i class="fa fa-undo"></i>
            </a>
    </div>
    {!!Form::close()!!}    
@endsection