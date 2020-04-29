@extends('admin.template.template')
@section('title','Gestion de Vendedores')
@section('contenido')
    <div class="row">
        <div class="formulario" style="box-shadow: none; padding:3px;">
            <div class="cabeceraForm">
                <h1>Gestion de Vendedores</h1>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="input-contenedor input-30 input-100" style="border: none;">
                        <a href="{{route('vendedores.create')}}" class="button-primary">Nuevo Vendedor</a>
                    </div>
                    {!! Form::open(['id'=>'inputcodigo','route'=>'vendedores.index','method'=>'GET']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> 
                        {!! Form::text('nombre', null, ['placeholder'=>'Nombre de Vendedor']) !!}
                    </div>
                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputbuscar','route'=>'vendedores.index','method'=>'GET','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i>
                        
                        {!! Form::text('direccion', null, ['placeholder'=>'Dirección']) !!}
                    </div>

                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputestante','route'=>'vendedores.index','method'=>'GET','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i> <input type="text" name="correo_electronico" id="correo_electronico" placeholder="Email">
                    </div>

                    {!! Form::close() !!}
                    <div class="input-contenedor input-30 input-100" style="padding: 7.8px; margin: 23px auto;">
                        
                        <input type="radio" style="margin-left: 1em" name="radio" value="1" id=""  onchange="mostrar(this.value);"> Nombre
                        <input type="radio" style="margin-left: 2em" name="radio" value="2" id="" onchange="mostrar(this.value);"> Dirección
                        <input type="radio" style="margin-left: 1em" name="radio" value="3" id="" onchange="mostrar(this.value);"> Email
                    </div>                                </div>

                <div class="main-container">
                    <table class="proveedor">
                        <thead>
                            <tr>
                                <th>Nombre de vendedor</th>
                                <th>Cedula</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vendedor as $vendedores)
                                <tr>
                                    <td>{{$vendedores->nombre_vendedor}}</td>
                                    <td>{{$vendedores->cedula_vendedor}}</td>
                                    <td>{{$vendedores->direccion}}</td>
                                    <td>{{$vendedores->telefono_vendedor}}</td>
                                    <td>{{$vendedores->correo_electronico}}</td>
                                    <td>
                                        <a href="{{route('vendedores.edit',$vendedores->id)}}" class="button-warning"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.vendedores.destroy',$vendedores->id)}}" class="button-danger" onclick="return confirm('¿Seguro que deseas eliminar este registro?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    {!!$vendedor->render()!!}
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