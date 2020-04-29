@extends('admin.template.template')
@section('title','Factura de Compra N°: '.$facturacompra->id)
@section('contenido')
{!!Form::open(['route'=>'compra.index','Method'=>'POST','class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Factura Compra<h1>
        </div>
        <div class="contenedor">
            <div class="input-contenedor input-50 input-100">
                <i class="icon" aria-hidden="true">N°</i>
                {!! Form::text('codigo_factura', $facturacompra->codigo_factura, ['placeholder'=>'Fecha','id'=>"fecha",'readOnly'])!!}
            </div>
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
        <div class="main-container" style="overflow: hidden">
            <table id="venta" class="detallefact" style="margin-left: 10px">
                <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th>precio</th>
                        <th>SubTotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalleFact as $detalle)
                        <tr>
                            <td>{{$detalle->descripcion}}</td>
                            <td>{{$detalle->cantidad}}</td>
                            <td>C${{$detalle->precio}}</td>
                            <td>C${{$detalle->subtotal}}</td>
                        </tr>
                       
                    @endforeach
                </tbody>
                <tfoot style="background: #aaa">
                    
                    <tr>
                        <th><b>Total: </b>C${{$facturacompra->total}}</th>
                    </tr>
                </tfoot>
            </table>
            <div class="container">
                @if (Auth::user()->Vendedor())
                <a href="{{route('compra.index')}}" class="button-primary">
                        <i class="fa fa-undo"></i>
                </a>
                @endif
                @if (Auth::user()->Gerente())
                    <a href="{{route('compra.index')}}" class="button-primary">
                            <i class="fa fa-undo"></i>
                    </a>
                @endif
            </div>
    </div>
    {!!Form::close()!!}    
@endsection