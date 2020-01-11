<nav class="menu">
    <ul>
        <li><i class="fa fa-home"></i> Inicio</li>

        <li><i><img src="{{asset('img/cajas.png')}}" alt=""></i> <a href="{{ route('productos.index')}}">Productos</a></li>
        <li><i><img src="{{asset('img/compras.png')}}" alt=""></i> <a>Compras</a>
            <ul>
                <li><i class="material-icons">library_add</i><a href="{{route('compra.create')}}"> Nueva Compra</a></li>
                <li><i><img src="{{asset('img/Factura.png')}}" alt=""></i> <a href="{{route('compra.index')}}"> Detalles Compras</a></li>
            </ul>
        </li>
        <li><i><img src="{{asset('img/firma (2).png')}}" alt=""></i> <a href="#">Reportes</a>
            <ul>
                <li><i><img src="{{asset('img/Factura.png')}}" alt=""></i><a href="{{ route('admin.reporte.producto')}}"> Reporte Producto</a></li>
                <li><i><img src="{{asset('img/Factura.png')}}" alt=""></i> <a href="{{ route('admin.reporte.venta')}}"> Reporte Ventas</a></li>
                <li><i><img src="{{asset('img/Factura.png')}}" alt=""></i> <a href="{{ route('admin.reporte.compra')}}"> Reporte Compras</a></li>
            </ul>
        </li>
        <li><i><img src="{{asset('img/camion-de-reparto.png')}}" alt=""></i> <a>Ventas</a>
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