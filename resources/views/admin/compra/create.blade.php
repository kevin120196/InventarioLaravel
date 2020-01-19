@extends('admin.template.template')
@section('title','Crear Compra')
@section('contenido')
@if ($errors->any())
    <div class="alert danger">
        
    <span class="closebtn">&times;</span>
        <ul>
            @foreach ($errors->all() as $error)
                <li style="list-style: none">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    {!!Form::open(['route'=>'compra.store','Method'=>'POST','class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Nueva Compra<h1>
        </div>
        <div class="contenedor">
            <div class="input-contenedor input-100">
                <i class="icon" aria-hidden="true">N°</i>
                {!! Form::number('codigo_factura', null, ['placeholder'=>'Número de Factura','id'=>"codigo_factura",'max'=>'1000000000'])!!}
            </div>
            <div class="input-contenedor input-50 input-100">
                <i class="fa fa-calendar icon" aria-hidden="true"></i>
                {!! Form::date('fecha_compra', null, ['placeholder'=>'Fecha','id'=>"fecha"])!!}
            </div>
    
            <div class="input-50 input-contenedor input-100">
                <i class="icon"><img src="{{asset('img/factura (1).png')}}" alt=""></i>
                {!! Form::select('estado_factura',['Pendiente'=>'Pendiente','Pagada'=>'Pagada'],null, ['class'=>'selectFactura','id'=>"estado_factura",'placeholder'=>'Estado factura'])!!}
            </div>
    
            <div class="input-contenedor input-30 input-100">
                <i class="icon"><img src="{{asset('img/factur.png')}}" alt=""></i>
                {!! Form::select('tipo_factura_id',$Tipo,null, ['class'=>'selectipofactura','id'=>"tipo_factura_id"]) !!}
            </div>
    
            <div class="input-contenedor input-70 input-100">
                <i class="icon"><img src="{{asset('img/fabricar (2).png')}}" alt=""></i>
                <select id="proveedores_id" name="proveedores_id" class="selectipoclien chosen">
                    <option value="">Proveedor</option>
                    @foreach($proveedor as $producto)
                        <option value="{{$producto->id}}">
                            {{$producto->nombre_proveedor}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="input-contenedor input-100">
                <i class="icon"><a id="myBtn" data-toggle="modal" data-target="#myModal"><img src="{{asset('img/caja.png')}}" alt="Usted puede realizar una Busqueda"></a></i>
                <select id="productos_id_productos" name="productos_id_productos" class="selectproduc chosen">
                    <option value="">Producto</option>
                    @foreach($productos as $producto)
                        <option value="{{$producto->id}}">
                        {{$producto->codigo_alterno}}-{{$producto->descripcion}}
                        </option>
                    @endforeach
                </select>
            </div>
            

            <div class="input-contenedor input-50 input-100">
                <i class="icon"><img src="{{asset('img/cantidad (4).png')}}" alt=""></i>
                {!! Form::number('cantidad', null, ['placeholder'=>'Cantidad','id'=>"cantidad"])!!}
            </div>
    
            <div class="input-contenedor input-50 input-100">
                <i class="fa fa-money icon"></i>
                {!! Form::text('precio', null, ['placeholder'=>'Precio','id'=>"precio"]) !!}
            </div>
            <a onclick="agregar()" id="btnagregar" class="button-primary"><i class="fa fa-plus"></i> </a>
        </div>
        <div class="main-container" style="overflow: hidden">
            <table id="venta" class="detallefact" style="margin-left: 10px">
                <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th>precio</th>
                        <th>Total</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot style="background: #aaa">
                    <tr>
                        <th><div id="totales">Total: C$0.00</div>

                    </tr>
                </tfoot>
            </table>
        <div class="container">
        <button type="submit" id="guardar" style="display: none" class="button-primary"><i class="fa fa-save"></i> Guardar</button>
        </div>  
    </div>
    
@include('admin.venta.details')    
    {!!Form::close()!!}
@endsection

    <script src="{{asset('js/jquery-git.js')}}"></script>

    <script>
        $(document).ready(function(){ 
    
            $("#guardar").hide();
            $(".chosen").chosen();    
          });
        
        var totalgeneral=0;
        var totalgeneral1=0;
        var subtotal=[];
        var cont=0;
        var total=0;
        function agregar(){
            var fecha = $('#fecha').val();
            var estado_factura= $('#estado_factura option:selected').text();
            var estado_factura1= $('#estado_factura option:selected').val();
            var tipo= $('#tipo_factura_id option:selected').text();
            var tipo1=$('#tipo_factura_id option:selected').val();
            var proveedor= $('#proveedores_id option:selected').text();
            var proveedor1= $('#proveedores_id option:selected').val();    
            var producto= $('#productos_id_productos option:selected').text();
            var producto1= $('#productos_id_productos option:selected').val();
            var cantidad= $('#cantidad').val();
            var precio= $('#precio').val();
            if(producto!="" && cantidad!="" && cantidad>0 && precio!=""){
                
                subtotal[cont]=(precio*cantidad);
                total = total + subtotal[cont];
                var fila='<tr id="fila' +cont+'"><input type="hidden" name="total" id="total" value="'+total+'"></th><td><input type="hidden" name="productos_id_productos[]" value="'+producto1+'">'+producto+'</td><td><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td><td><input type="hidden" name="precio[]" value="'+precio+'">C$'+precio+'</td><td><input type="hidden" name="subtotal[]" value="'+subtotal[cont]+'">C$'+subtotal[cont]+'</td><td><a class="button-danger btnEliminar"><i class="fa fa-remove" onclick="eliminar('+cont+')"></i></a></td></tr>';
                cont++;
                limpiar();
                $("#totales").html("Total: C$" + total);
                evaluar();   
                $('#venta').append(fila);
            }else{
                alert('Estimado usuario le hacen falta ingresar información por registrar para agregar al detalle');
            }
        //Eliminar fila
        }

        function eliminar(index){
            total=total-subtotal[index]; 
            $("#totales").html("Total: C$" + total);   
            $("#fila" + index).remove();
            evaluar();        
        }

         
    
          function evaluar()
          {
            if (total>0)
            {
              $("#guardar").show();
            }
            else
            {
              $("#guardar").hide(); 
            }
           }
      

        function limpiar(){
          $("#cantidad").val("");
          $("#cantidad").focus();
          $("#precio").val("");
        }
  
    </script>

 