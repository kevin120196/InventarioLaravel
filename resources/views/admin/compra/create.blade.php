@extends('admin.template.template')
@section('title','Crear Compra')
@section('contenido')
    {!!Form::open(['route'=>'compra.store','Method'=>'POST','class'=>'formulario'])!!}
        <div class="cabeceraForm">
            <h1>Nueva Compra<h1>
        </div>
        <div class="contenedor">
            <div class="input-contenedor input-50 input-100">
                <i class="fa fa-calendar icon" aria-hidden="true"></i>
                {!! Form::date('fecha_compra', null, ['placeholder'=>'Fecha','id'=>"fecha"])!!}
            </div>
    
            <div class="input-50 input-contenedor input-100">
                <i class="icon"><img src="{{asset('img/factura (1).png')}}" alt=""></i>
                {!! Form::select('estado_factura',['Cancelada'=>'Cancelada','Pendiente'=>'Pendiente','Anulada'=>'Anulada'],null, ['class'=>'selectFactura','id'=>"estado_factura",'placeholder'=>'Estado factura','required'])!!}
            </div>
    
            <div class="input-contenedor input-30 input-100">
                <i class="icon"><img src="{{asset('img/factur.png')}}" alt=""></i>
                {!! Form::select('tipo_factura_id',$Tipo,null, ['class'=>'selectipofactura','id'=>"tipo_factura_id"]) !!}
            </div>
    
            <div class="input-contenedor input-70 input-100">
                <i class="icon"><img src="{{asset('img/fabricar (2).png')}}" alt=""></i>
                {!! Form::select('proveedores_id',$proveedor,null, ['class'=>'selectipoclien','id'=>"proveedores_id"]) !!}
            </div>

            <div class="input-contenedor input-100">
                <i class="icon"><a id="myBtn" data-toggle="modal" data-target="#myModal"><img src="{{asset('img/caja.png')}}" alt="Usted puede realizar una Busqueda"></a></i>
                {!! Form::select('productos_id_productos',$producto,['placeholder'=>'Selecciona'], ['id'=>"productos_id_productos",'class'=>'selectproduc']) !!}
            </div>
            

            <div class="input-contenedor input-40 input-100">
                <i class="icon"><img src="{{asset('img/cantidad (4).png')}}" alt=""></i>
                {!! Form::number('cantidad', null, ['placeholder'=>'Cantidad','id'=>"cantidad"])!!}
            </div>
    
            <div class="input-contenedor input-40 input-100">
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
                        <th><div id="total"></div></th>
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
<script>
        
        var totalgeneral;
        var totalgeneral1;
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
        totalgeneral1=0;
        totalgeneral=0;
      /*precio descontado*/  var total=0;
      total=precio*cantidad;

        $("#venta > tbody").append("<tr><td><input type='hidden' name='productos_id_productos[]' value="+producto1+">"+producto+"</td><td><input type='hidden' name='cantidad[]' value="+cantidad+">"+cantidad+"</td><td><input type='hidden' name='precio[]' value="+precio+">"+precio+"</td><td><input type='hidden' name='total[]' value="+total+">"+total+"</td><td><a class='button-danger btnEliminar'><i class='fa fa-remove'></i></a></td></tr>");

      

        //Eliminar fila
        $('#venta').on('click','.btnEliminar', function(){
            
            var columnacon = $(this).closest('tr').find("td:eq(3)").text();
            var valor=parseFloat(totalgeneral);
            var valor2=parseFloat(columnacon);
            totalgeneral= parseFloat(valor - valor2).toFixed(1,0);
            totalgeneral1= parseFloat(valor - valor2).toFixed(1,0);
            $("#total").text(totalgeneral);
            $("#totalgeneral").text(totalgeneral1);
            console.log(totalgeneral);
            $(this).closest('tr').remove();


            
        });

        $('#venta > tbody > tr').each(function (index,tr){
        
            
            var columnacon=$(this).find("td:eq(3)").text()
            totalgeneral += parseFloat(columnacon);
            totalgeneral1 += parseFloat(columnacon);
            $("#total").text(totalgeneral.toFixed(2));
            $("#totalgeneral").text(totalgeneral1.toFixed(2));
            console.log(totalgeneral);
    

            if (producto1 == $(this).find('input:eq(0)').val() ) {
                //  block of code to be executed if the condition is true
                console.log('Esta en la tabla');
              } else {
                //  block of code to be executed if the condition is false
                
                
              }
           
              
        });
        $("#venta > tbody").append("<input type='hidden' name='totalgeneral' id='totalgeneral' value="+totalgeneral+">")
    }


    
    
</script>

 