@extends('admin.template.template')
@section('title','Reportes de Ventas')
@section('contenido')
    <div class="row">
        <div class="formulario" style="box-shadow: none; padding:3px;">
            <div class="cabeceraForm">
                <h1>Reportes de Inventario de Ventas</h1>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12" id="pdf">
                    <div class="input-contenedor input-30 input-100" style="border: none;">
                        <a href="{{route('admin.reportes.reportsVenta')}}" target="_blank" class="button-primary"><i class="fa fa-print"></i> Reporte General</a>
                    </div>
                    {!! Form::open(['id'=>'inputcodigo','route'=>'admin.reportes.reportsVenta','method'=>'GET','target'=>'_blank']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> 
                        {!! Form::number('codigo', null, ['placeholder'=>'N° Factura']) !!}
                    </div>
                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputbuscar','route'=>'admin.reportes.reportsVenta','method'=>'GET','target'=>'_blank','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i>
                        
                        {!! Form::text('fecha', null, ['placeholder'=>'Fecha de Facturación']) !!}
                    </div>

                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputestante','route'=>'admin.reportes.reportsVenta','method'=>'GET','target'=>'_blank','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i> <input type="text" name="estado" id="estado" placeholder="Estados Factura">
                    </div>

                    {!! Form::close() !!}
                    {!! Form::open(['id'=>'inputinvervalos','route'=>'admin.reportes.reportsVenta','method'=>'GET','style'=>'display:none','target'=>'_blank']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i> 
                        <input type="date" name="inicio" id="inicio" placeholder="Inicio">
                        
                    {!! Form::open(['id'=>'inputinvervalos1','route'=>'admin.reportes.reportsVenta','method'=>'GET','style'=>'display:none','target'=>'_blank']) !!}
                        
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
                <div class="col-md-12 col-lg-12" id="excel" style="display: none">
                    <div class="input-contenedor input-30 input-100" style="border: none;">
                        <a href="{{route('admin.reportes.excelReporteVenta')}}" class="button-primary"><i class="fa fa-print"></i> Reporte General</a>
                    </div>
                    {!! Form::open(['id'=>'inputcodigo2','route'=>'admin.reportes.excelReporteVenta','method'=>'GET']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> 
                        {!! Form::number('codigo', null, ['placeholder'=>'N° Factura']) !!}
                    </div>
                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputbuscar2','route'=>'admin.reportes.excelReporteVenta','method'=>'GET','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i>
                        
                        {!! Form::text('fecha', null, ['placeholder'=>'Fecha de Facturación']) !!}
                    </div>

                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputestante2','route'=>'admin.reportes.excelReporteVenta','method'=>'GET','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i> <input type="text" name="estado" id="estado" placeholder="Estados Factura">
                    </div>

                    {!! Form::close() !!}
                    {!! Form::open(['id'=>'inputinvervalos2','route'=>'admin.reportes.excelReporteVenta','method'=>'GET','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i> 
                        <input type="date" name="inicio" id="inicio" placeholder="Inicio">
                        
                    {!! Form::open(['id'=>'inputinvervalos12','route'=>'admin.reportes.excelReporteVenta','method'=>'GET','style'=>'display:none']) !!}
                        
                    <i class="fa fa-search icon"></i> 
                        <input type="date" name="fin" id="fin" placeholder="Fin">
                        <button type="submit" class="button-show" style="width: 100%"><i class="fa fa-search"></i></button>
                        {!! Form::close() !!}
                    </div>
                    {!! Form::close() !!}
                    <div class="input-contenedor input-30 input-100" style="padding: 13px; margin: 20px auto;">
                        
                        <input type="radio" style="margin-left: 1em" name="radio" value="5" id=""  onchange="mostrar(this.value);"> Código
                        <input type="radio" style="margin-left: 2em" name="radio" value="6" id="" onchange="mostrar(this.value);"> Fecha
                        <input type="radio" style="margin-left: 1em" name="radio" value="7" id="" onchange="mostrar(this.value);"> Estado
                        <input type="radio" style="margin-left: 1em" name="radio" value="8" id=""  onchange="mostrar(this.value);"> Intervalos de Fecha
                    </div>
        
                </div>

                <div class="row input-contenedor col-md-12" style="padding: 13px;margin:0px auto">
                    <div class="input-50 input-100" >
                        <a class="button-primary" id="btnPdf" style="width: 95%">PDF</a>
                    </div>

                    <div class="input-50 input-100" >
                        <a class="button-primary" id="btnExcel" style="width: 95%">EXCEL</a>
                    </div>
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
                                    <td>{{$ventas->codigo_factura}}</td>
                                    <td>{{$ventas->fecha_factura}}</td>
                                    <td>{{$ventas->estado_factura}}</td>
                                    <td>{{$ventas->tipos_factura->tipo_factura_nombre}}</td>
                                    <td>{{$ventas->clientes->nombre}}</td>
                                    <td>%{{$ventas->descuentos_clientes->descuento_cliente}}</td>
                                    <td>{{$ventas->vendedores->nombre_vendedor}}</td>
                                    <td>C${{$ventas->total}}</td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/jquery-git.js')}}"></script>
    <script>
        
        $(document).ready(function(){
            $("#btnPdf").click(function(){
                $('#pdf').show(1000,"swing");
                $('#excel').hide(1000,"swing");
             });
            $("#btnExcel").click(function(){
                $('#pdf').hide(1000,"swing");
                $('#excel').show(1000,"swing");
             });
        });
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

            if (dato == "5") {
                document.getElementById("inputcodigo2").style.display = "block";
                document.getElementById("inputbuscar2").style.display = "none";
                document.getElementById("inputestante2").style.display = "none";
                document.getElementById("inputinvervalos2").style.display = "none";
                document.getElementById("inputinvervalos12").style.display = "none";
                document.getElementById("buttonguardar2").style.display = "none";

            }
            if (dato == "6") {
                document.getElementById("inputcodigo2").style.display = "none";
                document.getElementById("inputbuscar2").style.display = "block";
                document.getElementById("inputestante2").style.display = "none";
                document.getElementById("inputinvervalos2").style.display = "none";
                document.getElementById("inputinvervalos12").style.display = "none";
                document.getElementById("buttonguardar2").style.display = "none";
            }
            if (dato == "7") {
                document.getElementById("inputcodigo2").style.display = "none";
                document.getElementById("inputbuscar2").style.display = "none";
                document.getElementById("inputestante2").style.display = "block";
                document.getElementById("inputinvervalos2").style.display = "none";
                document.getElementById("inputinvervalos12").style.display = "none";
                document.getElementById("buttonguardar2").style.display = "none";

            }

            if (dato == "8") {
                document.getElementById("inputcodigo2").style.display = "none";
                document.getElementById("inputbuscar2").style.display = "none";
                document.getElementById("inputestante2").style.display = "none";
                document.getElementById("inputinvervalos2").style.display = "block";
                document.getElementById("inputinvervalos12").style.display = "block";
                document.getElementById("buttonguardar2").style.display = "block";
            }
        }
    </script>

@endsection