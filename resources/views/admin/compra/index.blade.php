@extends('admin.template.template')
@section('title','Gestion de Proveedores')
@section('contenido')
    <div class="row">
        <div class="formulario" style="box-shadow: none; padding:3px;">
            <div class="cabeceraForm">
                <h1>Gestion de Compras</h1>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="input-contenedor input-30 input-100" style="border: none;">
                        <a href="{{route('compra.create')}}" class="button-primary">Nueva Compra</a>
                    </div>
                    {!! Form::open(['id'=>'inputcodigo','route'=>'compra.index','method'=>'GET']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> 
                        {!! Form::number('codigo', null, ['placeholder'=>'N° Factura']) !!}
                    </div>
                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputbuscar','route'=>'compra.index','method'=>'GET','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i>
                        
                        {!! Form::text('fecha', null, ['placeholder'=>'Fecha de Facturación']) !!}
                    </div>

                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputestante','route'=>'compra.index','method'=>'GET','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i> <input type="text" name="estado" id="estado" placeholder="Estados Factura">
                    </div>

                    {!! Form::close() !!}
                    <div class="input-contenedor input-30 input-100" style="padding: 13px; margin: 20px auto;">
                        
                        <input type="radio" style="margin-left: 1em" name="radio" value="1" id=""  onchange="mostrar(this.value);"> Código
                        <input type="radio" style="margin-left: 2em" name="radio" value="2" id="" onchange="mostrar(this.value);"> Fecha
                        <input type="radio" style="margin-left: 1em" name="radio" value="3" id="" onchange="mostrar(this.value);"> Estado
                    </div>                
                </div>

                <div class="main-container">
                    <table class="proveedor">
                        <thead>
                            <tr>
                                <th>N° Factura</th>
                                <th>Fecha de Facturacion</th>
                                <th>Estado</th>
                                <th>Tipo de Factura</th>
                                <th>Proveedor</th>
                                <th>Total</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($facturacompra as $compras)
                                <tr>
                                    <td>{{$compras->id}}</td>
                                    <td>{{$compras->fecha_compra}}</td>
                                    <td>{{$compras->estado_factura}}</td>
                                    <td>{{$compras->tipoFactura->tipo_factura_nombre}}</td>
                                    <td>{{$compras->proveedores->nombre_proveedor}}</td>
                                    <td>{{$compras->totalgeneral}}</td>
                                    <td>
                                        <a href="{{route('compra.show',$compras->id)}}" class="button-danger"><i class="fa fa-list"></i></a>
                                        <a href="{{route('admin.compra.report',$compras->id)}}" class="button-show"><i class="fa fa-print"></i></a>
                                    
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    {!!$facturacompra->render()!!}
                </div>
            </div>
        </div>
    </div>
@endsection