@extends('admin.template.template')
@section('title','Reportes de Productos')
@section('contenido')
    <div class="row">
        <div class="formulario" style="box-shadow: none; padding:3px;">
            <div class="cabeceraForm">
                <h1>Reportes Inventario de Productos</h1>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12" id="pdf">
                    <div class="input-contenedor input-30 input-100" style="border: none;" id="pdf">
                        <a href="{{route('admin.reportes.reporteProducto')}}" target="_blank" class="button-primary"><i class="fa fa-print"></i> Reporte General</a>
                    </div>
                    {!! Form::open(['id'=>'inputcodigo','route'=>'admin.reportes.reporteProducto','method'=>'GET','target'=>'_blank']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> <input type="text" name="codigo" id="codigo" placeholder="Codigo">
                    </div>

                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputdescripcion','route'=>'admin.reportes.reporteProducto','method'=>'GET','target'=>'_blank','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> <input type="text" name="descripcion" id="descripcion" placeholder="Descripción">
                    </div>

                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputestante','route'=>'admin.reportes.reporteProducto','method'=>'GET','target'=>'_blank','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i> <input type="text" name="estante" id="estante" placeholder="Estante">
                    </div>

                    {!! Form::close() !!}
                    <div class="input-contenedor input-30 input-100" style="padding: 13px; margin: 20px auto;">
                        
                        <input type="radio" style="margin-left: 1em" name="radio" value="1" id=""  onchange="mostrar(this.value);"> Código
                        <input type="radio" style="margin-left: 2em" name="radio" value="2" id="" onchange="mostrar(this.value);"> Descripción
                        <input type="radio" style="margin-left: 5em" name="radio" value="3" id="" onchange="mostrar(this.value);"> Estante
                    </div>
                </div>

                <div class="col-md-12 col-lg-12"  id="excel" style="display: none">
                    <div class="input-contenedor input-30 input-100" style="border: none;">
                        <a href="{{route('admin.reportes.excelReporteProducto')}}"  class="button-primary"><i class="fa fa-print"></i> Reporte General</a>
                    </div>
                    {!! Form::open(['id'=>'inputcodigo2','route'=>'admin.reportes.excelReporteProducto','method'=>'GET',]) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> <input type="text" name="codigo" id="codigo" placeholder="Codigo">
                    </div>

                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputdescripcion2','route'=>'admin.reportes.excelReporteProducto','method'=>'GET','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> <input type="text" name="descripcion" id="descripcion" placeholder="Descripción">
                    </div>

                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputestante2','route'=>'admin.reportes.excelReporteProducto','method'=>'GET','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i> <input type="text" name="estante" id="estante" placeholder="Estante">
                    </div>

                    {!! Form::close() !!}
                    <div class="input-contenedor input-30 input-100" style="padding: 13px; margin: 20px auto;">
                        
                        <input type="radio" style="margin-left: 1em" name="radio" value="6" id=""  onchange="mostrar(this.value);"> Código
                        <input type="radio" style="margin-left: 2em" name="radio" value="4" id="" onchange="mostrar(this.value);"> Descripción
                        <input type="radio" style="margin-left: 5em" name="radio" value="5" id="" onchange="mostrar(this.value);"> Estante
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
                    <table class="productos">
                        <thead>
                            <tr>
                                <th>Código Original</th>
                                <th>Código Alterno</th>
                                <th>Existencia</th>
                                <th>Precio compra</th>
                                <th>Precio Venta</th>
                                <th>Aplicacion</th>
                                <th>Descripcion</th>
                                <th>U/M</th>
                                <th>Numero Estante</th>
                                <th>Marca</th>
                                <th>Categoria</th>
                                <th>Proveedor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                                <tr>
                                    <td>{{$producto->codigo_original}}</td>
                                    <td>{{$producto->codigo_alterno}}</td>
                                    <td>{{$producto->cantidad}}</td>
                                    <td>{{$producto->precio_compra}}</td>
                                    <td>{{$producto->precio_venta}}</td>
                                    <td>{{$producto->aplicacion}}</td>
                                    <td>{{$producto->descripcion}}</td>
                                    <td>{{$producto->unidad_medida}}</td>
                                    <td>{{$producto->numero_rack}}</td>
                                    <td>{{$producto->marca->nombre_marca}}</td>
                                    <td>{{$producto->categoria->nombre_categoria}}</td>
                                    <td>{{$producto->proveedor->nombre_proveedor}}</td>
                                    
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
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
                document.getElementById("inputdescripcion").style.display = "none";
                document.getElementById("inputestante").style.display = "none";
            }
            if (dato == "2") {
                document.getElementById("inputcodigo").style.display = "none";
                document.getElementById("inputdescripcion").style.display = "block";
                document.getElementById("inputestante").style.display = "none";
            }
            if (dato == "3") {
                document.getElementById("inputcodigo").style.display = "none";
                document.getElementById("inputdescripcion").style.display = "none";
                document.getElementById("inputestante").style.display = "block";
            }
            if (dato == "6") {
                document.getElementById("inputcodigo2").style.display = "block";
                document.getElementById("inputdescripcion2").style.display = "none";
                document.getElementById("inputestante2").style.display = "none";
            }
            if (dato == "4") {
                document.getElementById("inputcodigo2").style.display = "none";
                document.getElementById("inputdescripcion2").style.display = "block";
                document.getElementById("inputestante2").style.display = "none";
            }
            if (dato == "5") {
                document.getElementById("inputcodigo2").style.display = "none";
                document.getElementById("inputdescripcion2").style.display = "none";
                document.getElementById("inputestante2").style.display = "block";
            }
        }
    </script>
@endsection