<nav class="menu">
    <ul>
        <li><i class="fa fa-home"></i><a href="{{route('admin.index')}}"> Inicio</a></li>
        <li><i><img src="{{asset('img/categoria.png')}}" alt=""></i> <a href="{{ route('categorias.index')}}">Categorias</a></li>
        <li><i><img src="{{asset('img/repuesto.png')}}"  alt=""></i> <a href="{{ route('marcas.index')}}">Marcas</a></li>
        <li><i><img src="{{asset('img/cajas.png')}}" alt=""></i> <a href="{{ route('productos.index')}}">Productos</a></li>
        <li><i><img src="{{asset('img/firma (2).png')}}" alt=""></i> <a>Reportes</a>
            <ul>
                <li><i><img src="{{asset('img/Factura.png')}}" alt=""></i><a href="{{ route('admin.reportes.producto')}}"> Reporte Producto</a></li>
            </ul>
        </li>
        <li id="user">                    
                <i class="fa fa-user"></i>  {{Auth::user()->name}}
                    <span class="fa fa-arrow-down"></span>
            <ul>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out"></i> Cerrar Sesion</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                </li>
                <hr>
                <li><i class="fa fa-home"></i><a href="{{route('admin.index')}}"> Inicio</a></li>
            </ul>
        </li>
    </ul>

</nav>