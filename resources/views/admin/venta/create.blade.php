@extends('admin.template.template')
@section('title','Crear Proveedor')
@section('contenido')
    {!!Form::open(['route'=>'ventas.store','Method'=>'POST'],['class'=>'formulario'])!!}
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
                <i class="fa fa-id-card icon" aria-hidden="true"></i>
                {!! Form::select('estado_factura',['Cancelada'=>'Cancelada','Pendiente'=>'Pendiente','Anulada'=>'Anulada'],null, ['class'=>'selectFactura','id'=>"estado_factura",'placeholder'=>'Estado factura','required'])!!}
            </div>
    
            <div class="input-contenedor input-30 input-100">
                <i class="material-icons icon">place</i>                        
                {!! Form::select('tipos_factura_id',$Tipo,null, ['class'=>"selectipofactura",'id'=>"tipos_factura_id"]) !!}
            </div>
    
            <div class="input-contenedor input-40 input-100">
                <i class="fa fa-phone icon" aria-hidden="true"></i>
                {!! Form::select('clientes_id',$cliente,null, ['class'=>'selectipoclien','id'=>"cliente_id"]) !!}
            </div>

            <div class="input-contenedor input-30 input-100">
                <i class="icon"><img src="{{asset('img/porciento.png')}}" alt=""></i>
                {!! Form::select('descuentos_clientes_id',$descuento,null, ['class'=>'selectdescuen','id'=>"descuento_id"]) !!}
            </div>

            <div class="input-contenedor input-100">
                <i class="fa fa-phone icon" aria-hidden="true"></i>
                {!! Form::select('vendedores_id',$vendedor,null, ['class'=>'selectdescuen','id'=>'vendedores_id']) !!}
            </div>
            
            <div class="input-contenedor input-30 input-100">
                <i class="fa fa-phone icon" aria-hidden="true"></i>
                {!! Form::select('productos_marcas_id',$producto,null, ['class'=>'selectproduc','id'=>"productos_marcas_id"]) !!}
            </div>
            

            <div class="input-contenedor input-30 input-100">
                <i class="fa fa-user icon" aria-hidden="true"></i>
                {!! Form::number('cantidad', null, ['placeholder'=>'Cantidad','id'=>"cantidad"])!!}
            </div>
    
            <div class="input-contenedor input-40 input-100">
                <i class="fa fa-money icon"></i>
                {!! Form::text('precio', null, ['placeholder'=>'Precio','id'=>"precio"]) !!}
            </div>
            <a onclick="agregar()" id="btnagregar" class="button-primary"><i class="fa fa-plus"></i> </a>
        </div>
        <div class="main-container">
            <table id="venta" class="productos">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Descuento</th>
                        <th>precio</th>
                        <th>Total</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot style="background: #aaa">
                    <tr>
                        <td><div id="total"></div></td>
                    </tr>
                </tfoot>
            </table>
            <button type="submit" class="button-primary"><i class="fa fa-save"></i> Guardar</button>
  
    </div>
    {!!Form::close()!!}
                 
@endsection
<script >

        var totalgeneral;
        function agregar(){
        var fecha = $('#fecha').val();
        var estado_factura= $('#estado_factura option:selected').text();
        var cliente1= $('#estado_factura option:selected').val();
        var tipo= $('#tipo_factura_id option:selected').text();
        var tipo1=$('#tipo_factura_id option:selected').val();
        var cliente= $('#cliente_id option:selected').text();
        var cliente1= $('#cliente_id option:selected').val();
        var descuento= $('#descuento_id option:selected').text();
        var descuento1= $('#descuento_id option:selected').val();
        var vendedores= $('#vendedores_id option:selected').text();
        var vendedores1= $('#vendedores_id option:selected').val();
        var producto= $('#productos_marcas_id option:selected').text();
        var producto1= $('#productos_marcas_id option:selected').val();
        var cantidad= $('#cantidad').val();
        var precio= $('#precio').val();
        var descuent=precio*descuento;
        var preciot=cantidad*precio;
        totalgeneral=0;
      /*precio descontado*/  var total=preciot-descuent;

        $("#venta > tbody").append("<tr><td><input type='hidden' name='productos_marcas_id[]' value="+producto1+">"+producto+"</td><td><input type='hidden' name='cantidad[]' value="+cantidad+">"+cantidad+"</td><td><input type='hidden' name='factura_descuento_id[]' value="+descuento1+">"+descuento+"</td><td><input type='hidden' name='precio[]' value="+precio+">"+precio+"</td><td><input type='hidden' name='total[]' value="+total+">"+total+"</td><td><a class='button-danger btnEliminar'><i class='fa fa-remove'></i></a></td></tr>");
        
        
        
        //Eliminar fila
        $('#venta').on('click','.btnEliminar', function(){
            
            var columnacon = $(this).closest('tr').find("td:eq(4)").text()
            var valor=parseFloat(totalgeneral);
            var valor2=parseFloat(columnacon);
            totalgeneral = (valor-valor2);
            $("#total").text(totalgeneral);
            console.log(Math.ceil(totalgeneral).toFixed(2));
            $(this).closest('tr').remove();


            
        });

        $('#venta > tbody > tr').each(function (index,tr){
            if (producto1 == $(this).find('input:eq(0)').val() ) {
                //  block of code to be executed if the condition is true
                var columnaFila=$(this).find("td:eq(1)").text();
                
                console.log(columnaFila);
              } else {
                //  block of code to be executed if the condition is false
                var columnacon=$(this).find("td:eq(4)").text();
                totalgeneral = parseFloat(totalgeneral) + parseFloat(columnacon);
                $("#total").text(totalgeneral);
                console.log(totalgeneral);            
              }
            
                
            
            
            
            
        });



 
   }

   

</script>