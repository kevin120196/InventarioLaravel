@extends('admin.template.template')
@section('title','Gestion de Categorias')
@section('contenido')

    <div class="row">
        <form action="" class="formulario" style="box-shadow: none;" >
        <div class="cabeceraForm">
            <h1>Gestion de Categorias</h1>
        </div>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="input-contenedor input-40 input-100" style="border: none;">
                        <a href="#" class="button-primary">Nueva Categoria</a>
                    </div>
                    <div class="input-contenedor input-50 input-100 buscar-input">
                        <i class="fa fa-search icon"></i> <input type="text" name="" placeholder="Buscar" id="">
                    </div>
                </div>
            </div>
            <div class="main-container">
                <table id="mytable">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Categoria</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoria as $categorias)
                            
                            <tr> 
                                <td>{{$categorias->id}}</td>
                                <td>{{$categorias->nombre_categoria}}</td>                            
                                <td><button class="button-danger"><span class="fa fa-trash"></span></button> <button class="button-warning"><span class="fa fa-edit"></span></button> <button class="button-show"><span class="fa fa-eye"></span></button></td>
                            </tr>
                        
                        @endforeach
                    </tbody>
                </table>
                {!! $categoria->render() !!}
            </div>
        </form>
    </div>

@endsection

