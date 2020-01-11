@extends('admin.template.template')
@section('title','Inicio')
@section('contenido')
                    <div class="row">
                        <form class="formulario">
                            <div class="contenedor">
                                <div class="cabeceraForm">
                                    <h1>Bienvenidos al Sistema de Inventario Repuestos El Triunfo</h1>
                                </div>

                                <div style="border: none; width:100%;" class="input-contenedor input-100">
                                    @if (Auth::user()->Gerente())
                                    <a class="button-primary" href="{{route('ventas.create')}}">Realizar Venta</a>
                                    <a class="button-primary" href="{{route('compra.create')}}">Realizar Compra</a>
                                    @endif
                                    @if (Auth::user()->Vendedor())
                                    <a class="button-primary" href="{{route('ventas.create')}}">Realizar Venta</a>
                                    <a class="button-primary" href="{{route('compra.create')}}">Realizar Compra</a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
@endsection
    

