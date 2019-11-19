<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{asset('css/stylos.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/bootstrap-grid.css')}}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/font-awesome-4.7.0/css/font-awesome.min.css')}}"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">

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
                                <li id="user1">
                                    Usuario
                                        <ul>
                                        <li class="enlace1"><a href="#"><i class="fa fa-user"></i>  kevintalavera12</a></li>
                                        <hr>
                                        <li class="enlace1"><a href="#"><i class="fa fa-sign-out"></i>  Cerrar Sesion</a></li>
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
                                <li><i><img src="{{asset('img/categoria.png')}}" alt=""></i> <a href="{{ route('categorias.index')}}">Categorias</a></li>
                                <li><i><img src="{{asset('img/repuesto.png')}}" alt=""></i> <a href="#">Marcas</a></li>
                                <li><i><img src="{{asset('img/cajas.png')}}" alt=""></i> <a href="#">Productos</a></li>
                                <li><i><img src="{{asset('img/inventario.png')}}" alt=""></i> <a href="{{route('proveedores.index')}}">Proveedores</a></li>
                                <li><i><img src="{{asset('img/vendedor.png')}}" alt=""></i> <a href="#">Vendedores</a></li>
                                <li><i><img src="{{asset('img/compras.png')}}" alt=""></i> <a href="#">Compras</a>
                                    <ul>
                                        <li><i class="material-icons">library_add</i><a href="#"> Nueva Compra</a></li>
                                        <li><i><img src="{{asset('img/Factura.png')}}" alt=""></i> <a href="#"> Detalles Compras</a></li>
                                    </ul>
                                </li>
                                <li><i><img src="{{asset('img/camion-de-reparto.png')}}" alt=""></i> <a href="#">Ventas</a>
                                    <ul>
                                        <li><i class="material-icons">library_add</i><a href="#"> Nueva Venta</a></li>
                                        <li><i><img src="{{asset('img/Factura.png')}}" alt=""></i> <a href="#"> Detalles Ventas</a></li>
                                    </ul>
                                </li>
                                <li id="user">                    
                                    Usuario <span class="fa fa-arrow-down"></span>
                                    <ul>
                                        <li><i class="fa fa-user"></i> Kevintalavera12</li>
                                        <hr>
                                        <li><i class="fa fa-sign-out"></i> Cerrar Sesion</li>
                                        <li><i class="fa fa-cog"></i> Configuracion</li>
                                    </ul>
                                </li>
                            </ul>

                        </nav>
                <article>
                    <div class:"container">
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

	@include('sweetalert::alert')
	@yield('js')
    </body>

</html>