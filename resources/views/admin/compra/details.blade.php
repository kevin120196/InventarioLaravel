<div id="myModal" class="modal" autofocus tabindex="-1" role="dialog" aria-hidden="true" >

  <!-- Modal content -->
  <div class="modal-content">
    <div class="cabeceraForm" style="color: white; text-align: center">
      <span class="close">&times;</span>
      <h2>Buscar Productos</h2>
    </div>
    <div class="modal-body">
          <div class="main-container">
                  <table class="productos" id="productos">
                      <thead>
                          <tr>
                              <th>Codigo Original</th>
                              <th>Codigo Alterno</th>
                              <th>Existencia</th>
                              <th>Precio Venta</th>
                              <th>Aplicacion</th>
                              <th>Descripcion</th>
                              <th>Numero Estante</th>
                              <th>Marca</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($productos as $producto)
                              <tr>
                                  <td>{{$producto->codigo_original}}</td>
                                  <td>{{$producto->codigo_alterno}}</td>
                                  <td>{{$producto->cantidad}}</td>
                                  <td>{{$producto->precio_venta}}</td>
                                  <td>{{$producto->aplicacion}}</td>
                                  <td>{{$producto->descripcion}}</td>
                                  <td>{{$producto->numero_rack}}</td>
                                  <td>{{$producto->marca->nombre_marca}}</td>
                              </tr>
                              @endforeach
                      </tbody>
                  </table>
                  {!!$productos->render()!!}
          </div>
    </div>

  </div>

</div>