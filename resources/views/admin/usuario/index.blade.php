@extends('admin.template.template')
@section('title','Gestion de Categorias')
@section('contenido')

    <div class="row">
        <div class="formulario" style="box-shadow: none;padding:3px" >
                <div class="cabeceraForm">
                    <h1>Gestion de Usuarios</h1>
                </div>

                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="input-contenedor input-40 input-100" style="border: none;">
                                <a href="{{route('usuarios.create')}}" class="button-primary">Nuevo Usuario</a>
                            </div>
                            <div class="input-contenedor input-50 input-100 buscar-input">
                                <i class="fa fa-search icon"></i> <input type="text" name="" placeholder="Buscar" id="">
                            </div>
                        </div>
                    </div>
                    <div class="main-container">
                        <table class="usuario">
                            <thead>
                                <tr>
                                    <th>Nombre Usuario</th>
                                    <th>Email</th>
                                    <th>Tipo de Usuario</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $usuario)
                                    
                                    <tr> 
                                        <td>{{$usuario->name}}</td>
                                        <td>{{$usuario->email}}</td>
                                        <td>{{$usuario->user_type}}</td>                            
                                        <td>
                                            <a href="{{route('usuarios.edit',$usuario->id)}}" class="button-warning"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('admin.usuarios.destroy',$usuario->id)}}" class="button-danger" onclick="return confirm('¿Seguro que deseas eliminar este registro?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                        {!! $user->render() !!}
                    </div>
            </div>
    </div>

@endsection

