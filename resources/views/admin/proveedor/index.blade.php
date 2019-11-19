@extends('admin.template.template')
@section('title','Gestion de Proveedores')
@section('contenido')
    <div class="row">
        <div class="formulario" style="box-shadow: none;">
            <div class="cabeceraForm">
                <h1>Gestion de Proveedores</h1>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="input-contenedor input-40 input-100" style="border: none;">
                        <a href="{{route('proveedores.create')}}" class="button-primary">Nuevo Proveedor</a>
                    </div>
                    <div class="input-contenedor input-50 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> <input type="text" name="" id="" placeholder="Buscar">
                    </div>
                </div>

                <div class="main-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre de Provedor</th>
                                <th>Cedula</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proveedor as $proveedores)
                                <tr>
                                    <td>{{$proveedores->nombre_proveedor}}</td>
                                    <td>{{$proveedores->cedula}}</td>
                                    <td>{{$proveedores->direccion_proveedor}}</td>
                                    <td>{{$proveedores->numero_telefono}}</td>
                                    <td>{{$proveedores->correo_electronico}}</td>
                                    <td>
                                        <a href="#" class="button-danger"><i class="fa fa-trash"></i></a>
                                        <a href="#" class="button-warning"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    {!!$proveedor->render()!!}
                </div>
            </div>
        </div>
    </div>
@endsection