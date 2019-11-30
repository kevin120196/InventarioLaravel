@extends('admin.template.template')
@section('title','Gestion de Proveedores')
@section('contenido')
    <div class="row">
        <div class="formulario" style="box-shadow: none; padding:3px;">
            <div class="cabeceraForm">
                <h1>Gestion de Clientes</h1>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="input-contenedor input-40 input-100" style="border: none;">
                        <a href="{{route('cliente.create')}}" class="button-primary">Nuevo Cliente</a>
                    </div>
                    <div class="input-contenedor input-50 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> <input type="text" name="" id="" placeholder="Buscar">
                    </div>
                </div>

                <div class="main-container">
                    <table class="proveedor">
                        <thead>
                            <tr>
                                <th>Nombre de cliente</th>
                                <th>Cedula</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>descuento</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cliente as $clientes)
                                <tr>
                                    <td>{{$clientes->nombre}}</td>
                                    <td>{{$clientes->cedula}}</td>
                                    <td>{{$clientes->direccion}}</td>
                                    <td>{{$clientes->numero_telefono}}</td>
                                    <td>{{$clientes->correo_electronico}}</td>
                                    <td>{{$clientes->descuento->descuento_cliente}}</td>
                                    <td>
                                        <a href="{{route('cliente.edit',$clientes->id)}}" class="button-warning"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.clientes.destroy',$clientes->id)}}" class="button-danger" onclick="return confirm('¿Seguro que deseas eliminar este registro?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    {!!$cliente->render()!!}
                    @include('admin.proveedor.show')
                </div>
            </div>
        </div>
    </div>
@endsection