@extends('admin.template.template')
@section('title','Gestion de Proveedores')
@section('contenido')
    <div class="row">
        <div class="formulario" style="box-shadow: none; padding:3px;">
            <div class="cabeceraForm">
                <h1>Gestion de Ventas</h1>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="input-contenedor input-40 input-100" style="border: none;">
                        <a href="{{route('ventas.create')}}" class="button-primary">Nueva Venta</a>
                    </div>
                    <div class="input-contenedor input-50 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> <input type="text" name="" id="" placeholder="Buscar">
                    </div>
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
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detalle as $detalles)
                                <tr>
                                    <td>{{$detalles->facturas_ventas_id}}</td>
                                    <td>{{$detalles->productos_marcas_id}}</td>
                                    <td>{{$detalles->cantidad}}</td>
                                    <td>{{$detalles->precio}}</td>
                                    <td>{{$detalles->total}}</td>
                                    <td><a class="button-show"><i class="fa fa-print"></i></a></td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    {!!$detalle->render()!!}
                    @include('admin.proveedor.show')
                </div>
            </div>
        </div>
    </div>
@endsection