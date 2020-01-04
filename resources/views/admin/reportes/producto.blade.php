@extends('admin.template.template')
@section('title','Reportes de Productos')
@section('contenido')
    <div class="row">
        <div class="formulario" style="box-shadow: none; padding:3px;">
            <div class="cabeceraForm">
                <h1>Reportes de Productos</h1>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    @if (Auth::user()->Gerente())
                    <div class="input-contenedor input-30 input-100" style="border: none;">
                        <a href="{{route('admin.reportes.reportsProducto')}}" target="_blank" class="button-primary"><i class="fa fa-print"></i> Reporte General</a>
                    </div>
                    {!! Form::open(['id'=>'inputcodigo','route'=>'admin.reportes.reportsProducto','method'=>'GET','target'=>'_blank']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> <input type="text" name="codigo" id="codigo" placeholder="Codigo">
                    </div>

                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputbuscar','route'=>'admin.reportes.reportsProducto','method'=>'GET','target'=>'_blank','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> <input type="text" name="descripcion" id="descripcion" placeholder="Descripción">
                    </div>

                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputestante','route'=>'admin.reportes.reportsProducto','method'=>'GET','target'=>'_blank','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i> <input type="text" name="estante" id="estante" placeholder="Estante">
                    </div>

                    {!! Form::close() !!}
                    <div class="input-contenedor input-30 input-100" style="padding: 13px; margin: 20px auto;">
                        
                        <input type="radio" style="margin-left: 1em" name="radio" value="1" id=""  onchange="mostrar(this.value);"> Código
                        <input type="radio" style="margin-left: 2em" name="radio" value="2" id="" onchange="mostrar(this.value);"> Descripción
                        <input type="radio" style="margin-left: 5em" name="radio" value="3" id="" onchange="mostrar(this.value);"> Estante
                    </div>
                    @endif
                    @if (Auth::user()->Vendedor())
                    <div class="input-contenedor input-30 input-100" style="border: none;">
                        <a href="{{route('admin.reporte.reportsProducto')}}" target="_blank" class="button-primary"><i class="fa fa-print"></i> Reporte General</a>
                    </div>
                    {!! Form::open(['id'=>'inputcodigo','route'=>'admin.reporte.reportsProducto','method'=>'GET','target'=>'_blank']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> <input type="text" name="codigo" id="codigo" placeholder="Codigo">
                    </div>

                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputbuscar','route'=>'admin.reporte.reportsProducto','method'=>'GET','target'=>'_blank','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> <input type="text" name="descripcion" id="descripcion" placeholder="Descripción">
                    </div>

                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputestante','route'=>'admin.reporte.reportsProducto','method'=>'GET','target'=>'_blank','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i> <input type="text" name="estante" id="estante" placeholder="Estante">
                    </div>

                    {!! Form::close() !!}
                    <div class="input-contenedor input-30 input-100" style="padding: 13px; margin: 20px auto;">
                        
                        <input type="radio" style="margin-left: 1em" name="radio" value="1" id=""  onchange="mostrar(this.value);"> Código
                        <input type="radio" style="margin-left: 2em" name="radio" value="2" id="" onchange="mostrar(this.value);"> Descripción
                        <input type="radio" style="margin-left: 5em" name="radio" value="3" id="" onchange="mostrar(this.value);"> Estante
                    </div>
                    @endif
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
                    {!!$productos->render()!!}
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
            }
            if (dato == "2") {
                document.getElementById("inputcodigo").style.display = "none";
                document.getElementById("inputbuscar").style.display = "block";
                document.getElementById("inputestante").style.display = "none";
            }
            if (dato == "3") {
                document.getElementById("inputcodigo").style.display = "none";
                document.getElementById("inputbuscar").style.display = "none";
                document.getElementById("inputestante").style.display = "block";
            }
        }
    </script>
@endsection