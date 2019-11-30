@extends('admin.template.template')
@section('title','Crear Proveedor')
@section('contenido')
    {!!Form::open(['class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Nueva Venta<h1>
        </div>
        <div class="contenedor">
            <div class="input-contenedor input-50 input-100">
                <i class="fa fa-calendar icon" aria-hidden="true"></i>
                {!! Form::date('fecha', null, ['placeholder'=>'Fecha','id'=>"fecha"])!!}
            </div>
    
            <div class="input-50 input-contenedor input-100">
                <i class="fa fa-id-card icon" aria-hidden="true"></i>
                {!! Form::select('estado_factura',['Cancelada'=>'Cancelada','Pendiente'=>'Pendiente','Anulada'=>'Anulada'],null, ['class'=>'selectFactura','id'=>"estado_factura",'placeholder'=>'Estado factura','required'])!!}
            </div>
    
            <div class="input-contenedor input-30 input-100">
                <i class="material-icons icon">place</i>                        
                {!! Form::select('tipos_factura_id',$Tipo,null, ['class'=>'selectipofactura','id'=>"tipos_factura_id"]) !!}
            </div>
    
            <div class="input-contenedor input-70 input-100">
                <i class="fa fa-phone icon" aria-hidden="true"></i>
                {!! Form::select('proveedores_id',$proveedor,null, ['class'=>'selectipoclien','id'=>"cliente_id"]) !!}
            </div>

            <div class="input-contenedor input-100">
                <i class="fa fa-phone icon" aria-hidden="true"></i>
                {!! Form::select('productos_marca_id',$marcas,null, ['class'=>'selectproduc','id'=>"productos_marca_id"]) !!}
            </div>
            

            <div class="input-contenedor input-40 input-100">
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
        var vendedores= $('#vendedores_id option:selected').text();
        var vendedores1= $('#vendedores_id option:selected').val();
        var producto= $('#productos_marca_id option:selected').text();
        var producto1= $('#productos_marca_id option:selected').val();
        var cantidad= $('#cantidad').val();
        var precio= $('#precio').val();
       
        totalgeneral=0;
      /*precio descontado*/  var total=0;
      total=precio*cantidad;

        $("#venta > tbody").append("<tr><td><input type='hidden' name='producto_marca_id[]' value="+producto1+">"+producto+"</td><td><input type='hidden' name='producto_cantidad_id[]' value="+cantidad+">"+cantidad+"</td><td><input type='hidden' name='factura_precio_id[]' value="+precio+">"+precio+"</td><td><input type='hidden' name='factura_total_id[]' value="+total+">"+total+"</td><td><a class='button-danger btnEliminar'><i class='fa fa-remove'></i></a></td></tr>");
             
        
        //Eliminar fila
        $('#venta').on('click','.btnEliminar', function(){
            
            var columnacon = $(this).closest('tr').find("td:eq(3)").text();
            var valor=parseFloat(totalgeneral);
            var valor2=Math.floor(columnacon);
            valor -= parseFloat(columnacon);
            $("#total").text(totalgeneral);
            console.log(totalgeneral);
            $(this).closest('tr').remove();


            
        });

        $('#venta > tbody > tr').each(function (index,tr){
        
            
            var columnacon=$(this).find("td:eq(3)").text()
            totalgeneral += parseFloat(columnacon);
            $("#total").text(totalgeneral.toFixed(2));
            console.log(totalgeneral);
    

            if (producto1 == $(this).find('input:eq(0)').val() ) {
                //  block of code to be executed if the condition is true
                console.log('Esta en la tabla');
              } else {
                //  block of code to be executed if the condition is false
                
                
              }
            
                
            
            
            
            
        });



 
   }

   

</script>