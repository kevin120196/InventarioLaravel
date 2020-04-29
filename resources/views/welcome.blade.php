@extends('admin.template.template')
@section('title','Inicio')
@section('contenido')
                    <div class="row">
                        <form class="formulario">
                            <div class="contenedor">
                                <div class="cabeceraForm">
                                    <h1>Bienvenidos al Sistema de Inventario Y Facturación</h1>
                                    <h1>Auto Repuestos El Triunfo</h1>
                                </div>

                                <div style="border: none; width:100%;" class="input-contenedor input-100">
                                    @if (Auth::user()->Gerente())
                                    <a target="_blank" class="button-primary" href="{{route('ventas.create')}}">Realizar Venta</a>
                                    <a target="_blank" class="button-primary" href="{{route('compra.create')}}">Realizar Compra</a>
                                    @endif
                                    @if (Auth::user()->Vendedor())
                                    <a target="_blank" class="button-primary" href="{{route('ventas.create')}}">Realizar Venta</a>
                                    <a target="_blank" class="button-primary" href="{{route('compra.create')}}">Realizar Compra</a>
                                    @endif
                                    @if (Auth::user()->Bodega())
                                    <a target="_blank" class="button-primary" href="{{route('productos.create')}}">Realizar Producto</a>
                                    <a target="_blank" class="button-primary" href="{{route('admin.reportes.producto')}}">Ver inventario</a>
                                    @endif


                                </div>
                            </div>
                        </form>
                    </div>
@endsection
    

