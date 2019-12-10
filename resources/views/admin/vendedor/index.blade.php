@extends('admin.template.template')
@section('title','Gestion de Vendedores')
@section('contenido')
    <div class="row">
        <div class="formulario" style="box-shadow: none; padding:3px;">
            <div class="cabeceraForm">
                <h1>Gestion de Vendedores</h1>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="input-contenedor input-40 input-100" style="border: none;">
                        <a href="{{route('vendedores.create')}}" class="button-primary">Nuevo Vendedor</a>
                    </div>
                    <div class="input-contenedor input-50 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> <input type="text" name="" id="" placeholder="Buscar">
                    </div>
                </div>

                <div class="main-container">
                    <table class="proveedor">
                        <thead>
                            <tr>
                                <th>Nombre de vendedor</th>
                                <th>Cedula</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vendedor as $vendedores)
                                <tr>
                                    <td>{{$vendedores->nombre_vendedor}}</td>
                                    <td>{{$vendedores->cedula_vendedor}}</td>
                                    <td>{{$vendedores->direccion}}</td>
                                    <td>{{$vendedores->telefono_vendedor}}</td>
                                    <td>{{$vendedores->correo_electronico}}</td>
                                    <td>
                                        <a href="{{route('vendedores.edit',$vendedores->id)}}" class="button-warning"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.vendedores.destroy',$vendedores->id)}}" class="button-danger" onclick="return confirm('¿Seguro que deseas eliminar este registro?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    {!!$vendedor->render()!!}
                    @include('admin.proveedor.show')
                </div>
            </div>
        </div>
    </div>
@endsection