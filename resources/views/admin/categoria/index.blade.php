@extends('admin.template.template')
@section('title','Gestion de Categorias')
@section('contenido')

    <div class="row">
        <div class="formulario" style="box-shadow: none;padding:3px" >
                <div class="cabeceraForm">
                    <h1>Gestion de Categorias</h1>
                </div>

                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="input-contenedor input-100" style="border: none;">
                                <a href="{{route('categorias.create')}}" class="button-primary">Nueva Categoria</a>
                            </div>
                        </div>
                    </div>
                    <div class="main-container">
                        <table class="categoria">
                            <thead>
                                <tr>
                                    <th>Categoria</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoria as $categorias)
                                    
                                    <tr> 
                                        <td>{{$categorias->nombre_categoria}}</td>                            
                                        <td>
                                            <a href="{{route('categorias.edit',$categorias->id)}}" class="button-warning"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('admin.categorias.destroy',$categorias->id)}}" class="button-danger" onclick="return confirm('¿Seguro que deseas eliminar este registro?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                        {!! $categoria->render() !!}
                    </div>
            </div>
    </div>

@endsection

