$("#proveedores_id").change(function(event){
  $.get("compra/"+event.target.value+"",function(response,proveedores_id){ 
    $("#productos_id_productos").empty();
    for(i=0; i<response.length; i++){
        $("#productos_id_productos").append("<option value='"+response[i]+"'> "+response[i].id+"</option>")
      }
  });
});

