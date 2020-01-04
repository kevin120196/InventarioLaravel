<nav class="menu">
    <ul>
        <li><i class="fa fa-home"></i> Inicio</li>
        <li><i><img src="{{asset('img/bodega.png')}}" alt="" style="margin-left: -7px"></i> <a href="#">Bodega</a>
            <ul>
                <li><i><img src="{{asset('img/categoria.png')}}" alt=""></i> <a href="{{ route('categorias.index')}}">Categorias</a></li>
                <li><i><img src="{{asset('img/repuesto.png')}}"  alt=""></i> <a href="{{ route('marcas.index')}}">Marcas</a></li>
                <li><i><img src="{{asset('img/cajas.png')}}" alt=""></i> <a href="{{ route('productos.index')}}">Productos</a></li>
            </ul>
        </li>
        <li><i class="fa fa-users"></i> <a href="{{route('usuarios.index')}}">Usuario</a></li>
        <li><i><img src="{{asset('img/descuento.png')}}" style="margin-bottom: -5px; margin-left: -4px" alt=""></i> <a href="{{route('descuentos.index')}}">Descuentos</a></li>
        <li><i><img src="{{asset('img/inventario.png')}}" alt=""></i> <a href="{{route('proveedores.index')}}">Proveedores</a></li>
        <li><i><img src="{{asset('img/clientes (1).png')}}" alt=""></i> <a href="{{route('cliente.index')}}">Clientes</a></li>
        <li><i><img src="{{asset('img/vendedor.png')}}" alt=""></i> <a href="{{route('vendedores.index')}}">Vendedores</a></li>
        <li><i><img src="{{asset('img/compras.png')}}" alt=""></i> <a href="#">Compras</a>
            <ul>
                <li><i class="material-icons">library_add</i><a href="{{route('compra.create')}}"> Nueva Compra</a></li>
                <li><i><img src="{{asset('img/Factura.png')}}" alt=""></i> <a href="{{route('compra.index')}}"> Detalles Compras</a></li>
            </ul>
        </li>
        <li><i><img src="{{asset('img/firma (2).png')}}" alt=""></i> <a href="#">Reportes</a>
            <ul>
                <li><i><img src="{{asset('img/Factura.png')}}" alt=""></i><a href="{{ route('admin.reportes.producto')}}"> Reporte Producto</a></li>
                <li><i><img src="{{asset('img/Factura.png')}}" alt=""></i> <a href="{{ route('admin.reportes.venta')}}"> Reporte Ventas</a></li>
                <li><i><img src="{{asset('img/Factura.png')}}" alt=""></i> <a href="{{ route('admin.reportes.compra')}}"> Reporte Compras</a></li>
            </ul>
        </li>
        <li><i><img src="{{asset('img/camion-de-reparto.png')}}" alt=""></i> <a href="{{route('ventas.index')}}">Ventas</a>
            <ul>
                <li><i class="material-icons">library_add</i><a href="{{ route('ventas.create')}}"> Nueva Venta</a></li>
                <li><i><img src="{{asset('img/Factura.png')}}" alt=""></i> <a href="{{route('ventas.index')}}"> Detalles Ventas</a></li>
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