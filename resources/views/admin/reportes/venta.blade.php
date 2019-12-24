@extends('admin.template.template')
@section('title','Reportes de Ventas')
@section('contenido')
    <div class="row">
        <div class="formulario" style="box-shadow: none; padding:3px;">
            <div class="cabeceraForm">
                <h1>Reportes de Ventas</h1>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="input-contenedor input-30 input-100" style="border: none;">
                        <a href="{{route('admin.reporte.reportsVenta')}}" target="_blank" class="button-primary"><i class="fa fa-print"></i> Reporte General</a>
                    </div>
                    {!! Form::open(['id'=>'inputcodigo','route'=>'admin.reporte.reportsVenta','method'=>'GET','target'=>'_blank']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> 
                        {!! Form::number('codigo', null, ['placeholder'=>'N° Factura']) !!}
                    </div>
                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputbuscar','route'=>'admin.reporte.reportsVenta','method'=>'GET','target'=>'_blank','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i>
                        
                        {!! Form::text('fecha', null, ['placeholder'=>'Fecha de Facturación']) !!}
                    </div>

                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputestante','route'=>'admin.reporte.reportsVenta','method'=>'GET','target'=>'_blank','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i> <input type="text" name="estado" id="estado" placeholder="Estados Factura">
                    </div>

                    {!! Form::close() !!}
                    {!! Form::open(['id'=>'inputinvervalos','route'=>'admin.reporte.reportsVenta','method'=>'GET','style'=>'display:none','target'=>'_blank']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i> 
                        <input type="date" name="inicio" id="inicio" placeholder="Inicio">
                        
                    {!! Form::open(['id'=>'inputinvervalos1','route'=>'admin.reporte.reportsVenta','method'=>'GET','style'=>'display:none','target'=>'_blank']) !!}
                        
                    <i class="fa fa-search icon"></i> 
                        <input type="date" name="fin" id="fin" placeholder="Fin">
                        <button type="submit" class="button-show" style="width: 100%"><i class="fa fa-search"></i></button>
                        {!! Form::close() !!}
                    </div>
                    {!! Form::close() !!}
                    <div class="input-contenedor input-30 input-100" style="padding: 13px; margin: 20px auto;">
                        
                        <input type="radio" style="margin-left: 1em" name="radio" value="1" id=""  onchange="mostrar(this.value);"> Código
                        <input type="radio" style="margin-left: 2em" name="radio" value="2" id="" onchange="mostrar(this.value);"> Fecha
                        <input type="radio" style="margin-left: 1em" name="radio" value="3" id="" onchange="mostrar(this.value);"> Estado
                        <input type="radio" style="margin-left: 1em" name="radio" value="4" id=""  onchange="mostrar(this.value);"> Intervalos de Fecha
                    </div>
                </div>

                <div class="main-container">
                    <table class="Venta">
                        <thead>
                            <tr>
                                <th>Nº Factura</th>
                                <th>Fecha de Facturación</th>
                                <th>Estado de Factura</th>
                                <th>Tipo de Factura</th>
                                <th>Cliente</th>
                                <th>Descuento</th>
                                <th>Vendedor</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($venta as $ventas)
                                <tr>
                                    <td>{{$ventas->id}}</td>
                                    <td>{{$ventas->fecha_factura}}</td>
                                    <td>{{$ventas->estado_factura}}</td>
                                    <td>{{$ventas->tipos_factura->tipo_factura_nombre}}</td>
                                    <td>{{$ventas->clientes->nombre}}</td>
                                    <td>{{$ventas->descuentos_clientes->descuento_cliente}}</td>
                                    <td>{{$ventas->vendedores->nombre_vendedor}}</td>
                                    <td>{{$ventas->totalgeneral}}</td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    {!!$venta->render()!!}
                </div>
            </div>
        </div>
    </div>

    <script>
        
        jQuery(function ($) {
            $("input:radio[name=radio]").click(disp)
        })

        function mostrar(dato) {
            if (dato == "1") {
                document.getElementById("inputcodigo").style.display = "block";
                document.getElementById("inputbuscar").style.display = "none";
                document.getElementById("inputestante").style.display = "none";
                document.getElementById("inputinvervalos").style.display = "none";
                document.getElementById("inputinvervalos1").style.display = "none";
                document.getElementById("buttonguardar").style.display = "none";

            }
            if (dato == "2") {
                document.getElementById("inputcodigo").style.display = "none";
                document.getElementById("inputbuscar").style.display = "block";
                document.getElementById("inputestante").style.display = "none";
                document.getElementById("inputinvervalos").style.display = "none";
                document.getElementById("inputinvervalos1").style.display = "none";
                document.getElementById("buttonguardar").style.display = "none";
            }
            if (dato == "3") {
                document.getElementById("inputcodigo").style.display = "none";
                document.getElementById("inputbuscar").style.display = "none";
                document.getElementById("inputestante").style.display = "block";
                document.getElementById("inputinvervalos").style.display = "none";
                document.getElementById("inputinvervalos1").style.display = "none";
                document.getElementById("buttonguardar").style.display = "none";

            }

            if (dato == "4") {
                document.getElementById("inputcodigo").style.display = "none";
                document.getElementById("inputbuscar").style.display = "none";
                document.getElementById("inputestante").style.display = "none";
                document.getElementById("inputinvervalos").style.display = "block";
                document.getElementById("inputinvervalos1").style.display = "block";
                document.getElementById("buttonguardar").style.display = "block";
            }
        }
    </script>

@endsection