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
            <div class="input-contenedor input-50 input-100">
                <i class="fa fa-calendar icon" aria-hidden="true"></i>
                {!! Form::date('fecha_factura', null, ['placeholder'=>'Fecha','id'=>"fecha"])!!}
            </div>
    
            <div class="input-50 input-contenedor input-100">
                <i class="icon"><img src="{{asset('img/factura (1).png')}}" alt=""></i>                
                {!! Form::select('estado_factura',['Cancelada'=>'Cancelada','Pendiente'=>'Pendiente','Anulada'=>'Anulada'],null, ['class'=>'selectFactura','id'=>"estado_factura",'placeholder'=>'Estado factura','required'])!!}
            </div>
    
            <div class="input-contenedor input-30 input-100">
                <i class="icon"><img src="{{asset('img/factur.png')}}" alt=""></i>
                {!! Form::select('tipos_factura_id',$Tipo,null, ['class'=>"selectipofactura",'id'=>"tipos_factura_id"]) !!}
            </div>
    
            <div class="input-contenedor input-40 input-100">
                <i class="icon"><img src="{{asset('img/clientes.png')}}" alt=""></i>
                {!! Form::select('clientes_id',$cliente,null, ['class'=>'selectipoclien','id'=>"cliente_id"]) !!}
            </div>

            <div class="input-contenedor input-30 input-100">
                <i class="icon"><img src="{{asset('img/porciento.png')}}" alt=""></i>
                {!! Form::select('descuentos_clientes_id',$descuento,null, ['class'=>'selectdescuen','id'=>"descuento_id"]) !!}
            </div>

            <div class="input-contenedor input-100">
                <i class="icon"><img src="{{asset('img/compras (2).png')}}" alt=""></i>
                {!! Form::select('vendedores_id',$vendedor,null, ['class'=>'selectdescuen','id'=>'vendedores_id']) !!}
            </div>
            
            <div class="input-contenedor input-30 input-100">
                <i class="icon"><a id="myBtn" data-toggle="modal" data-target="#myModal"><img src="{{asset('img/caja.png')}}" alt="Usted puede realizar una Busqueda"></a></i>
                {!! Form::select('productos_id',$producto,null, ['class'=>'selectproduc','id'=>"productos_id"]) !!}
            </div>
            

            <div class="input-contenedor input-30 input-100">
                <i class="icon"><img src="{{asset('img/cantidad (4).png')}}" alt=""></i>
                {!! Form::number('cantidad', null, ['placeholder'=>'Cantidad','id'=>"cantidad"])!!}
            </div>
    
            <div class="input-contenedor input-40 input-100">
                <i class="fa fa-money icon"></i>
                {!! Form::text('precio', null, ['placeholder'=>'Precio','id'=>"precio"]) !!}
            </div>
            <div class="input-contenedor input-100">
                <i class="icon">IVA</i> 
                <input class="desactivado" type="text" name="iva" id="iva" placeholder="IVA" value="0.15">
                <p style="margin-top: 13px"> <b>Habilitar</b> <input id="button2" type="checkbox" checked="checked" value="Click to enable check boxes"/></p>

            </div>
            <a onclick="agregar()" id="btnagregar" class="button-primary"><i class="fa fa-plus"></i> </a>
        </div>
        <div class="main-container" style="overflow: hidden">
            <table id="venta" class="productos" style="margin-left: 10px">
                <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th>Descuento</th>
                        <th>precio</th>
                        <th>IVA</th>
                        <th>Total</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot style="background: #aaa">
                    <tr>
                        <td><b>Total:</b><div id="total"></div></td>
                    </tr>
                </tfoot>
            </table>
            <div class="container">
                <button type="submit" class="button-primary"><i class="fa fa-save"></i> Guardar</button>
            </div> 
    </div>


          

@include('admin.venta.details')    
    {!!Form::close()!!}

@endsection
    <script src="https://code.jquery.com/jquery-git.js"></script>
    <script >

            var totalgeneral;
            var totalgeneral1;
            function agregar(){
            var fecha = $('#fecha').val();
            var estado_factura= $('#estado_factura option:selected').text();
            var estado_factura1= $('#estado_factura option:selected').val();
            var tipo= $('#tipo_factura_id option:selected').text();
            var tipo1=$('#tipo_factura_id option:selected').val();
            var cliente= $('#cliente_id option:selected').text();
            var cliente1= $('#cliente_id option:selected').val();
            var descuento= $('#descuento_id option:selected').text();
            var descuento1= $('#descuento_id option:selected').val();
            var vendedores= $('#vendedores_id option:selected').text();
            var vendedores1= $('#vendedores_id option:selected').val();
            var producto= $('#productos_id option:selected').text();
            var producto1= $('#productos_id option:selected').val();
            var cantidad= $('#cantidad').val();
            var precio= $('#precio').val();
            var iva=$('#iva').val();
            var descuent=precio*descuento;
            var preciot=cantidad*precio;
            totalgeneral=0;
            totalgeneral1=0;
            var subtotal1=preciot-descuent;
            var subtotal=subtotal1*iva;
        /*precio descontado*/
            var total=subtotal+subtotal1;
           
            $("#venta > tbody").append("<tr><td><input type='hidden' name='productos_id[]' value="+producto1+">"+producto+"</td><td><input type='hidden' name='cantidad[]' value="+cantidad+">"+cantidad+"</td><td><input type='hidden' name='factura_descuento_id[]' value="+descuento1+">"+descuento+"</td><td><input type='hidden' name='precio[]' value="+precio+">"+precio+"</td><td><input type='hidden' name='iva[]' value="+iva+">"+iva+"</td><td><input type='hidden' name='total[]' value="+total+">"+total+"</td><td><a class='button-danger btnEliminar'><i class='fa fa-remove'></i></a></td></tr>");
            
            //Agregar fila
            $('#venta > tbody > tr').each(function (index,tr){
                
                var columnacon=$(this).find("td:eq(5)").text();
                console.log(columnacon);
                totalgeneral += parseFloat(columnacon);
                totalgeneral1 += parseFloat(columnacon);
                $("#total").text(totalgeneral.toFixed(2));
                $("#totalgeneral").text(totalgeneral1.toFixed(2));
                if (producto1 == $(this).find('input:eq(0)').val() ) {
                    //  block of code to be executed if the condition is true
                    var columnaFila=$(this).find("td:eq(1)").text();
                    
                } else {
                    //  block of code to be executed if the condition is false
                    
                }
                $("#venta > tbody").append("<input type='hidden' name='totalgeneral' id='totalgeneral' value="+totalgeneral+">")
            });
            
            //Eliminar fila
            $('#venta').on('click','.btnEliminar', function(){
                
                var columnacon = $(this).closest('tr').find("td:eq(5)").text()
                var valor=parseFloat(totalgeneral);
                var valor2=parseFloat(columnacon);
                totalgeneral = parseFloat(valor - valor2);
                totalgeneral1= parseFloat(valor - valor2);
                $("#total").text(totalgeneral);
                $("#totalgeneral").text(totalgeneral1);
                $(this).closest('tr').remove();


                
            });    
    }
    $(document).ready(function(){ 
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('.desactivado').prop("disabled", false);
                
            }
            else if($(this).prop("checked") == false){
                $('.desactivado').prop("disabled", true);
                $( "input:disabled" ).val(0)
            }
        });
        
      });
    </script>