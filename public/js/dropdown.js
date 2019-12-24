/*$("#proveedores_id").change(function(event){
  $.get("admin/compra/create/productosGet/"+event.target.value+"",function(response,proveedores_id){ 
    console.log('cargado');
    $("#productos_id_productos").empty();
    for(i=0; i<response.length; i++){
        $("#productos_id_productos").append("<option value='"+response[i]+"'> "+response[i].id+"</option>")
      }
  });
});

*/

 /* $('select[name="proveedores_id"]').on('change', function(){

      if(proveedores_id) {
          $.ajax({
              url: "admin/compra/create/productosGet/"+$(this).val(),
              type:"GET",
              dataType:"json",
              beforeSend: function(){
                $('#loader').css("visibility", "visible");
              },
              success:function(data) {

                  $('select[name="productos_id_productos"]').empty();

                  $.each(data, function(key, value){

                      $('select[name="productos_id_productos"]').append('<option value="'+ key +'">' + value + '</option>');

                  });
              },
              complete: function(){
                  $('#loader').css("visibility", "hidden");
              }
          });
      } else {
          $('select[name="productos_id_productos"]').empty();
      }

  });
*/