$(document).on('ready',funcMain);

function funcMain(){
    $("#addFila").on('click', newRowTable);
    $("loans_table").on('click','.btn btn-danger', eliminarProducto);
    $("loans_table").on('click','.btn btn-warning', actualizarProducto);

    $("body").on('click','.btn btn-danger', eliminarProducto);
    $("body").on('click','.btn btn-warning', actualizarProducto);
}
function newRowTable()
{
    var numero=document.getElementById("numero").value;
    var codigo=document.getElementById("codigo").value;
    var descripcion=document.getElementById("descripcion").value;
    var cantidad=document.getElementById("cantidad").value;
    var precio=document.getElementById("precio").value;
    var subtotal=parseFloat(cantidad)*parseFloat(precio);
    var impuesto=parseFloat(subtotal)*0.15;
    var total_n=parseFloat(subtotal)+parseFloat(impuesto);

    var name_table=document.getElementById("TablaFactura");

    var row=name_table.insertRow(0+1);
    var cel1=row.insertCell(0);
    var cel2=row.insertCell(1);
    var cel3=row.insertCell(2);
    var cel4=row.insertCell(3);
    var cel5=row.insertCell(4);
    var cel6=row.insertCell(5);
    var cel7=row.insertCell(6);
    var cel8=row.insertCell(7);
    var cel9=row.insertCell(8);

    cel1.innerHTML='<p name="numero_f[]" class="non-margin">'+numero+'</p>';
    cel2.innerHTML='<p name="codigo_p[]" class="non-margin">'+codigo+'</p>';
    cel3.innerHTML='<p name="descripcion_p[]" class="non-margin">'+descripcion+'</p>';
    cel4.innerHTML='<p name="cantidad_p[]" class="non-margin">'+cantidad+'</p>';
    cel5.innerHTML='<p name="precio_p[]" class="non-margin">'+precio+'</p>';
    cel6.innerHTML='<p name="subtotal_p[]" class="non-margin">'+subtotal+'</p>';
    cel7.innerHTML='<p name="impuesto_p[]" class="non-margin">'+impuesto+'</p>';
    cel8.innerHTML='<p name="total_p[]" class="non-margin">'+total_n+'</p>';
    cel9.innerHTML = '<span class="fa fa-edit"></span><span class="fa fa-eraser"></span>';

    calcularTotal(cantidad,precio,subtotal,impuesto,total_n,1);
} 

function calcularTotal(cantidad,precio,subtotal,impuesto,total,accion){
    var t_cantidad=parseFloat(document.getElementById("total_cantidad").innerHTML);
    var t_precio=parseFloat(document.getElementById("total_precio").innerHTML);
    var t_subtotal=parseFloat(document.getElementById("total_subtotal").innerHTML);
    var t_impuesto=parseFloat(document.getElementById("total_impuesto").innerHTML);
    var t_total=parseFloat(document.getElementById("total_total").innerHTML);

    if(accion==1){
        document.getElementById("total_cantidad").innerHTML=parseFloat(t_cantidad)+parseFloat(cantidad);
		document.getElementById("total_precio").innerHTML=parseFloat(t_precio)+parseFloat(precio);
		document.getElementById("total_subtotal").innerHTML=parseFloat(t_subtotal)+parseFloat(subtotal);
		document.getElementById("total_impuesto").innerHTML=parseFloat(t_impuesto)+parseFloat(impuesto);
		document.getElementById("total_total").innerHTML=parseFloat(t_total)+parseFloat(total);

    }else if(accion==2){
        document.getElementById("total_cantidad").innerHTML=parseFloat(t_cantidad)-parseFloat(cantidad);
		document.getElementById("total_precio").innerHTML=parseFloat(t_precio)-parseFloat(precio);
		document.getElementById("total_subtotal").innerHTML=parseFloat(t_subtotal)-parseFloat(subtotal);
		document.getElementById("total_impuesto").innerHTML=parseFloat(t_impuesto)-parseFloat(impuesto);
		document.getElementById("total_total").innerHTML=parseFloat(t_total)-parseFloat(total);
    }else{
        alert('accion invalidad');
    }
}

function format(input){
    var num=input.value.replace(/\,/g,'');
    if (!isNaN(num)) {
        input.value=num;
    }else{
        alert('solo se permiten numeros');
        input.value=input.value.replace(/[^\d\.]\*/g,'');
    }
}