@extends('admin.template.template')
@section('title','Gestion de Productos')
@section('contenido')
    <div class="row">
        <div class="formulario" style="box-shadow: none; padding:3px;">
            <div class="cabeceraForm">
                <h1>Gestion de Productos</h1>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="input-contenedor input-30 input-100" style="border: none;">
                        <a href="{{route('productos.create')}}" class="button-primary">Nuevo Productos</a>
                    </div>
                    {!! Form::open(['id'=>'inputcodigo','route'=>'productos.index','method'=>'GET']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> <input type="text" name="codigo" id="codigo" placeholder="Codigo">
                    </div>

                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputbuscar','route'=>'productos.index','method'=>'GET','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i> <input type="text" name="marca" id="marca" placeholder="Marca">
                    </div>

                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputestante','route'=>'productos.index','method'=>'GET','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i> <input type="text" name="estante" id="estante" placeholder="Estante">
                    </div>

                    {!! Form::close() !!}
                    <div class="input-contenedor input-30 input-100" style="padding: 13px; margin: 20px auto;">
                        
                        <input type="radio" style="margin-left: 1em" name="radio" value="1" id=""  onchange="mostrar(this.value);"> codigo
                        <input type="radio" style="margin-left: 2em" name="radio" value="2" id="" onchange="mostrar(this.value);"> Marca
                        <input type="radio" style="margin-left: 1em" name="radio" value="3" id="" onchange="mostrar(this.value);"> Estante
                    </div>
                </div>

            </div>

            <div class="main-container">
                    <table class="productos">
                        <thead>
                            <tr>
                                <th>Codigo Original</th>
                                <th>Codigo Alterno</th>
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
                                <th>Accion</th>
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
                                    
                                    <td>
                                        <a href="{{route('productos.edit',$producto->id)}}" class="button-warning"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.productos.destroy',$producto->id)}}" class="button-danger" onclick="return confirm('¿Seguro que deseas eliminar este registro?')"><i class="fa fa-trash"></i></a>
                                        <a id="myBtn" class="button-show" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>
                                    </td>
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