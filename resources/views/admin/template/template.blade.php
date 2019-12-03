<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{asset('css/stylos.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/bootstrap-grid.css')}}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/font-awesome-4.7.0/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">

        <title>@yield('title','Default') | Panel de Administracion Sistema de Inventario</title>
    </head>
    <body>
          
        <main>
                <header> 
                        <nav class="men">
                            <a href="#" class="enlaceLogo" >Respuestos El Triunfo</a>
                            <ul>
                                <li>
                                    <label for="check"><span class="fa fa-bars" aria-hidden="true"></span> Menu</label>
                                </li>
                                <li>
                                    <label class="labl" for="">Sistema de Inventario Repuestos El Triunfo</label>
                                </li>
                                <li class="enlace1" id="user1">
                                    <a href="#"><i class="fa fa-user"></i>  {{Auth::user()->name}}
                                        <ul>
                                        <hr>
                                        <li class="enlace1"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out"></i> Cerrar Sesion</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                        </li>
                                        <li class="enlace1"><a href="#"><i class="fa fa-cog"></i> Configuracion</a></li>
                                        <hr>
                                        <li class="enlace1"><a href="#"><i class="fa fa-home"></i> Inicio</a></span></li>        
                                    </ul>
                                </li>     
                            </ul>   
                        </nav>

                    </header>
            <div class="content-all">
                    <input type="checkbox" name="" id="check">          

                    <nav class="menu">
                            <ul>
                                <li><i class="fa fa-home"></i> Inicio</li>
                                <li><i class="fa fa-users"></i> <a href="{{route('usuarios.index')}}">Usuario</a></li>

                                <li><i><img src="{{asset('img/categoria.png')}}" alt=""></i> <a href="{{ route('categorias.index')}}">Categorias</a></li>
                                <li><i><img src="{{asset('img/repuesto.png')}}" alt=""></i> <a href="{{ route('marcas.index')}}">Marcas</a></li>
                                <li><i><img src="{{asset('img/cajas.png')}}" alt=""></i> <a href="{{ route('productos.index')}}">Productos</a></li>
                                <li><i><img src="{{asset('img/inventario.png')}}" alt=""></i> <a href="{{route('proveedores.index')}}">Proveedores</a></li>
                                <li><i><img src="{{asset('img/clientes (1).png')}}" alt=""></i> <a href="{{route('cliente.index')}}">Clientes</a></li>
                                <li><i><img src="{{asset('img/vendedor.png')}}" alt=""></i> <a href="#">Vendedores</a></li>
                                <li><i><img src="{{asset('img/compras.png')}}" alt=""></i> <a href="#">Compras</a>
                                    <ul>
                                        <li><i class="material-icons">library_add</i><a href="{{route('compra.index')}}"> Nueva Compra</a></li>
                                        <li><i><img src="{{asset('img/Factura.png')}}" alt=""></i> <a href="#"> Detalles Compras</a></li>
                                    </ul>
                                </li>
                                <li><i><img src="{{asset('img/camion-de-reparto.png')}}" alt=""></i> <a href="{{route('ventas.index')}}">Ventas</a>
                                    <ul>
                                        <li><i class="material-icons">library_add</i><a href="{{ route('ventas.index')}}"> Nueva Venta</a></li>
                                        <li><i><img src="{{asset('img/Factura.png')}}" alt=""></i> <a href="{{route('detalleVenta.index')}}"> Detalles Ventas</a></li>
                                    </ul>
                                </li>
                                <li id="user">                    
                                        <i class="fa fa-user"></i>  {{Auth::user()->name}}
                                            <span class="fa fa-arrow-down"></span>
                                    <ul>
                                        <hr>
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out"></i> Cerrar Sesion</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                        </li>
                                        <li><i class="fa fa-cog"></i> Configuracion</li>
                                    </ul>
                                </li>
                            </ul>

                        </nav>
                <article>
                    <div class="container">
                        @yield('contenido')    
                    </div>
                </article>

            </div>

            <footer class="cabecera">
                <ul>
                    <li><h3>Diseñador y Desarrollado Por:</h3></li>
                    <li><h4>Kevin Antonio Talavera</h4></li>
                    <li><h4>Israel Levi Espinal</h4></li>
                </ul>
            </footer>
        </main>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
        
	@include('sweetalert::alert')
        <script>
                var close = document.getElementsByClassName("closebtn");
        var i;

        for (i = 0; i < close.length; i++) {
            close[i].onclick = function(){
                var div = this.parentElement;
                div.style.opacity = "0";
                setTimeout(function(){ div.style.display = "none"; }, 600);
            }
        }
        
            // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }    
        
        $document.ready(function(){
            $('#btnagregar').click(function(){
                agregar();
            });
    
            var cont=0;
            function agregar(){
                cont++;
                var fila='<tr id="fila'+cont+'">
                        <td>'+cont+'</td>
                        <td>sdf</td>
                        <td>sdf</td>
                        <td>sdf</td>
                        <td>sdf</td>
                        <td>dsf</td>
                        <td>
                        <button type="submit" class="button-danger">
                            <i class="fa fa-trash"></i>
                        </button></td>
                </tr>';
                $('#produc').append(fila);
            }


    </script>

	@yield('js')
    </body>

</html>
