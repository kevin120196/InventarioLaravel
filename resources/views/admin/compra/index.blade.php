@extends('admin.template.template')
@section('title','Gestion de Compras')
@section('contenido')
    <div class="row">
        <div class="formulario" style="box-shadow: none; padding:3px;">
            <div class="cabeceraForm">
                <h1>Gestion de Compras</h1>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    @if (Auth::user()->Gerente())
                    <div class="input-contenedor input-30 input-100" style="border: none;">
                        <a target="_blank" href="{{route('compra.create')}}" target="_blank" class="button-primary">Nueva Compra</a>
                    </div>
                    {!! Form::open(['id'=>'inputcodigo','route'=>'compra.index','method'=>'GET']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> 
                        {!! Form::number('codigo', null, ['placeholder'=>'N° Factura']) !!}
                    </div>
                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputbuscar','route'=>'compra.index','method'=>'GET','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i>
                        
                        {!! Form::text('fecha', null, ['placeholder'=>'Fecha de Facturación']) !!}
                    </div>

                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputestante','route'=>'compra.index','method'=>'GET','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i> <input type="text" name="estado" id="estado" placeholder="Estados Factura">
                    </div>

                    {!! Form::close() !!}
                    {!! Form::open(['id'=>'inputinvervalos','route'=>'compra.index','method'=>'GET','style'=>'display:none','target'=>'_blank']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i> 
                        <input type="date" name="inicio" id="inicio" placeholder="Inicio">
                        
                    {!! Form::open(['id'=>'inputinvervalos1','route'=>'compra.index','method'=>'GET','style'=>'display:none','target'=>'_blank']) !!}
                        
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
                    @endif
                    @if (Auth::user()->Vendedor())
                    <div class="input-contenedor input-30 input-100" style="border: none;">
                        <a target="_blank" href="{{route('compra.create')}}" target="_blank" class="button-primary">Nueva Compra</a>
                    </div>
                    {!! Form::open(['id'=>'inputcodigo','route'=>'compra.index','method'=>'GET']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> 
                        {!! Form::number('codigo', null, ['placeholder'=>'N° Factura']) !!}
                    </div>
                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputbuscar','route'=>'compra.index','method'=>'GET','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i>
                        
                        {!! Form::text('fecha', null, ['placeholder'=>'Fecha de Facturación']) !!}
                    </div>

                    {!! Form::close() !!}

                    {!! Form::open(['id'=>'inputestante','route'=>'compra.index','method'=>'GET','style'=>'display:none']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i> <input type="text" name="estado" id="estado" placeholder="Estados Factura">
                    </div>

                    {!! Form::close() !!}
                    {!! Form::open(['id'=>'inputinvervalos','route'=>'compra.index','method'=>'GET','style'=>'display:none','target'=>'_blank']) !!}
                    <div class="input-contenedor input-30 input-100 buscar-input" >
                        <i class="fa fa-search icon"></i> 
                        <input type="date" name="inicio" id="inicio" placeholder="Inicio">
                        
                    {!! Form::open(['id'=>'inputinvervalos1','route'=>'compra.index','method'=>'GET','style'=>'display:none','target'=>'_blank']) !!}
                        
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
                    @endif
                </div>

                <div class="main-container">
                    <table class="Compras">
                        <thead>
                            <tr>
                                <th>N° Factura</th>
                                <th>Fecha de Facturacion</th>
                                <th>Estado</th>
                                <th>Tipo de Factura</th>
                                <th>Proveedor</th>
                                <th>Total</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($facturacompra as $compras)
                                <tr>
                                    <td>{{$compras->codigo_factura}}</td>
                                    <td>{{$compras->fecha_compra}}</td>
                                    <td>{{$compras->estado_factura}}</td>
                                    <td>{{$compras->tipoFactura->tipo_factura_nombre}}</td>
                                    <td>{{$compras->proveedores->nombre_proveedor}}</td>
                                    <td>C${{$compras->total}}</td>
                                    <td>
                                        @if (Auth::user()->Gerente())
                                        <a href="{{route('compra.show',$compras->id)}}" target="_blank" class="button-detail"><i class="fa fa-list"></i></a>
                                        <a href="{{route('admin.compra.report',$compras->id)}}" target="_blank" class="button-show"><i class="fa fa-print"></i></a>
                                        <a href="{{route('admin.compra.destroy',$compras->id)}}" class="button-danger" onclick="return confirm('¿Seguro que deseas Anular la Factura?')"><i class="fa fa-window-close"></i></a>
                                        <a href="{{route('admin.compra.devol',$compras->id)}}" class="button-warning" onclick="return confirm('¿Seguro que deseas pasar a devolucion la Factura?')"><i class="fa fa-undo"></i></a>
                                        @endif
                                        @if (Auth::user()->Vendedor())
                                        <a href="{{route('compra.show',$compras->id)}}" target="_blank" class="button-detail"><i class="fa fa-list"></i></a>
                                        <a href="{{route('admin.compra.report',$compras->id)}}" target="_blank" class="button-show"><i class="fa fa-print"></i></a>
                                        
                                        @endif
                          
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                       
                    </table>
                    {!!$facturacompra->render()!!}
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{asset('js/jquery-git.js')}}"></script>
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
        var int=self.setInterval("refresh()",60000);
	function refresh()
	{
		location.reload(true);
	}
    </script>
