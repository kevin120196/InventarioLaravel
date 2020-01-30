@extends('admin.template.template')
@section('title','Crear Venta')
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
    {!!Form::open(['route'=>'ventas.store','Method'=>'POST' ,'class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Nueva Venta<h1>
        </div>
        {{ csrf_field() }}
        <div class="contenedor">
            <div class="input-contenedor input-100">
                <i class="icon" aria-hidden="true">N°</i>
                {!! Form::number('codigo_factura', null, ['placeholder'=>'Número de Factura','id'=>"codigo_factura",'max'=>'1000000000'])!!}
            </div>
            <div class="input-contenedor input-50 input-100">
                <i class="fa fa-calendar icon" aria-hidden="true"></i>
                {!! Form::date('fecha_factura', null, ['placeholder'=>'Fecha','id'=>"fecha"])!!}
            </div>
    
            <div class="input-50 input-contenedor input-100">
                <i class="icon"><img src="{{asset('img/factura (1).png')}}" alt=""></i>                
                {!! Form::select('estado_factura',['Pendiente'=>'Pendiente','Pagada'=>'Pagada'],null, ['class'=>'selectFactura','id'=>"estado_factura",'placeholder'=>'Estado factura'])!!}
            </div>
    
            <div class="input-contenedor input-30 input-100">
                <i class="icon"><img src="{{asset('img/factur.png')}}" alt=""></i>
                {!! Form::select('tipos_factura_id',$Tipo,null, ['class'=>"selectipofactura",'id'=>"tipos_factura_id"]) !!}
            </div>
    
            <div class="input-contenedor input-40 input-100" style="height: 46px">
                <i class="icon"><img src="{{asset('img/clientes.png')}}" alt=""></i>
                <select id="clientes_id" name="clientes_id" class="selectdescuen chosen">
                    <option value="">Cliente</option>
                    @foreach($cliente as $producto)
                        <option value="{{$producto->id}}">
                            {{$producto->nombre}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="input-contenedor input-30 input-100">
                <i class="icon"><img src="{{asset('img/porciento.png')}}" alt=""></i>
                <select id="descuentos_clientes_id" name="descuentos_clientes_id" class="selectdescuen">
                    <option value="">Descuento</option>
                    @foreach($descuento as $producto)
                        <option value="{{$producto->id}}">
                            {{$producto->descuento_cliente}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="input-contenedor input-100">
                <i class="icon"><img src="{{asset('img/compras (2).png')}}" alt=""></i>
                <select id="vendedores_id" name="vendedores_id" class="selectdescuen chosen">
                    <option value="">Vendedor</option>
                    @foreach($vendedor as $producto)
                        <option value="{{$producto->id}}">
                            {{$producto->nombre_vendedor}}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="input-contenedor input-30 input-100" style="height: 44.9px">
                <i class="icon"><a id="myBtn" data-toggle="modal" data-target="#myModal"><img src="{{asset('img/caja.png')}}" alt="Usted puede realizar una Busqueda"></a></i>
                <select id="productos_id" name="productos_id" class="selectproduc chosen">
                    <option value="">Producto</option>
                    @foreach($productos as $producto)
                        <option value="{{$producto->id}}_{{$producto->cantidad}}_{{$producto->precio_venta}}">
                            {{$producto->codigo_alterno}}-{{$producto->descripcion}}
                        </option>
                    @endforeach
                </select>
                
            </div>
            
            <div class="input-contenedor input-40 input-100">
                <i class="icon"><img src="{{asset('img/cantidad (4).png')}}" alt=""></i>
                {!! Form::text('cantidad', null, ['placeholder'=>'Cantidad','id'=>"cantidad"])!!}
            </div>

            <div class="input-contenedor input-30 input-100">
                <i class="icon"><img src="{{asset('img/cantidad (4).png')}}" alt=""></i>
                {!! Form::number('stock', null, ['placeholder'=>'Stock','id'=>"stock","disabled"])!!}
            </div>
    
            <div class="input-contenedor input-100">
                <i class="fa fa-money icon"></i>
                {!! Form::text('precio', null, ['placeholder'=>'Precio','id'=>"precio"]) !!}
            </div>
            <div class="input-contenedor input-100">
                <i class="icon">IVA</i> 
                <input class="desactivado" type="number" name="iva" id="iva" placeholder="IVA" value="15" disabled>
                <p style="margin-top: 13px"> <b>Exonerar</b> <input id="button2" type="checkbox" checked="checked" value="Click to enable check boxes"/></p>

            </div>
            <a onclick="agregar()" id="btnagregar" class="button-primary"><i class="fa fa-plus"></i> </a>
        </div>
        <div class="main-container" style="overflow: hidden">
            <table id="venta" class="productos" style="margin-left: 10px">
                <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th>precio</th>
                        <th>Descuento</th>
                        <th>IVA</th>
                        <th>Subtotal</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot style="background: #aaa">
                    <tr>
                        <th><div id="totales">Total: C$0.00</div>
                        
                    </tr>
                    <tr>
                        <th><div id="IVA">IVA: 0.00</div>

                    </tr>
                </tfoot>
            </table>
            <div class="container">
                <button type="submit" style="display: none" id="guardar" class="button-primary"><i class="fa fa-save"></i> Guardar</button>
            </div> 
    </div>


          

@include('admin.venta.details')    
    {!!Form::close()!!}

@endsection
<script src="{{asset('js/jquery-git.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){ 
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('.desactivado').prop("disabled", true);
                $( "#iva" ).val(15)
            }
            else if($(this).prop("checked") == false){
                $('.desactivado').prop("disabled", true);
                $( "#iva" ).val(0)
            }
        });

        $("#guardar").hide();
        $(".chosen").chosen();

        $('.selectproduc').on('change', function(evt, params) {
            datos=document.getElementById('productos_id').value.split('_'); 
            $('#stock').val(datos[1]);
            $('#precio').val(datos[2]); 
            $('#cantidad').focus();
          });
      });


      $(document).on('change', '#productos_id', function() {
        // Does some stuff and logs the event to the console
        datos=document.getElementById('productos_id').value.split('_'); 
        $('#stock').val(datos[1]);
        $('#precio').val(datos[2]); 
        $("#cantidad").focus();
        });
        
            var totalgeneral=0;
            var totalgeneral1=0;
            var fecha = $('#fecha').val();
            var estado_factura= $('#estado_factura option:selected').text();
            var estado_factura1= $('#estado_factura option:selected').val();
            var tipo= $('#tipo_factura_id option:selected').text();
            var tipo1=$('#tipo_factura_id option:selected').val();
            var cliente= $('#cliente_id option:selected').text();
            var cliente1= $('#cliente_id option:selected').val();
            var vendedores= $('#vendedores_id option:selected').text();
            var vendedores1= $('#vendedores_id option:selected').val();
            //
            var subtotal=[];
            var cont=0;
            var total=0;
            //
            function agregar(){
                datos=document.getElementById('productos_id').value.split('_'); 
                
                var descuento= $('#descuentos_clientes_id option:selected').text();
                var descuento1= $('#descuento_clientes_id option:selected').val();
                var producto= $('#productos_id option:selected').text();
                var producto1= datos[0];
                var cantidad= $('#cantidad').val();
                var precio= $('#precio').val();
                var iva=$('#iva').val()/100;
                var iva1=$('#iva').val();
                totalgeneral=0;
                totalgeneral1=0;
                var descuent=precio*descuento;
                var subtotal1=cantidad*(precio-descuent);
                var subtotales=subtotal1*iva;
                var precioiva=(precio/(iva+1)).toFixed(2);
                var ivaresiduo=((precio-precioiva)*cantidad).toFixed(2);
                var totaliva=precioiva-(-precio);
                var stock=$('#stock').val();
                 /*precio descontado*/
                //var total=subtotal+subtotal1;
                    if(producto!="" && cantidad!="" && cantidad>0 && precio!="" &&descuento!="Descuento"){

                        if(stock>cantidad){
                            subtotal[cont]=(parseFloat(subtotal1)).toFixed(2);
                            
                            total=(parseFloat(total)+parseFloat(subtotal[cont])).toFixed(2);
                            var fila='<tr id="fila' +cont+'"><input type="hidden" name="total" id="total" value="'+total+'"><td><input type="hidden" name="productos_id[]" value="'+producto1+'">'+producto+'</td><td><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td><td><input type="hidden" name="precio[]" value="'+precioiva+'">C$'+precioiva+'</td><td><input type="hidden" name="descuento[]" value="'+descuento+'">%'+descuento+'</td><td><input type="hidden" name="iva[]" value="'+ivaresiduo+'">'+ivaresiduo+'</td><td><input type="hidden" name="subtotal[]" value="'+subtotal[cont]+'">C$'+subtotal[cont]+'</td><td><a class="button-danger btnEliminar"><i class="fa fa-remove" onclick="eliminar('+cont+')"></i></a></td></tr>';
                            cont++;
                            limpiar();
                            $("#totales").html("Total: C$" + parseFloat(total).toFixed(2));   
                            $("#IVA").html("IVA: " + iva1+"%");   
                            evaluar();
                            $('#venta').append(fila);
    
                        }else{
                            alert('La cantidad a vender es mayor a la del stock')
                        }
                    }else{
                        alert('Estimado usuario le hacen falta ingresar información por registrar para agregar al detalle');
                    }
            //Agregar fila
             }

             function eliminar(index){
                total=total-subtotal[index]; 
                $("#totales").html("Total: C$" + parseFloat(total).toFixed(1));   
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
      }
    </script>