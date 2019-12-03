@extends('admin.template.template')
@section('title','Gestion de Proveedores')
@section('contenido')
    <div class="row">
        <div class="formulario" style="box-shadow: none; padding:3px;">
            <div class="cabeceraForm">
                <h1>Gestion de Ventas</h1>
            </div>
                <div class="main-container">
                    <table class="proveedor">
                        <thead>
                            <tr>
                                <th>Factura</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detalle as $detalles)
                                <tr>
                                    <td>{{$detalles->venta_id}}</td>
                                    <td>{{$detalles->marca_id}}</td>
                                    <td>{{$detalles->cantidad}}</td>
                                    <td>{{$detalles->precio}}</td>
                                    <td>{{$detalles->total}}</td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    {!!$detalle->render()!!}
                    @include('admin.proveedor.show')
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="input-contenedor input-100" style="border: none;">
                            <a href="{{route('ventas.index')}}" class="button-primary"><i class="fa fa-undo"></i></a>
                        </div>
                    </div>
    
            </div>
        </div>
    </div>
@endsection