@extends('admin.template.template')
@section('title','Gestion de Marcas')
@section('contenido')

    <div class="row">
        <form action="" class="formulario" style="box-shadow: none;padding:3px;" >
        <div class="cabeceraForm">
            <h1>Gestion de Marcas</h1>
        </div>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="input-contenedor input-40 input-100" style="border: none;">
                        <a href="{{route('categorias.create')}}" class="button-primary">Nueva Marca</a>
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
                            <th>Marca</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($marca as $marcas)
                            
                            <tr> 
                                <td>{{$marcas->id}}</td>
                                <td>{{$marcas->nombre_marca}}</td>                            
                                <td>
                                    <a href="{{route('marcas.edit',$marcas->id)}}" class="button-warning"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('admin.marcas.destroy',$marcas->id)}}" class="button-danger" onclick="return confirm('¿Seguro que deseas eliminar este registro?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        
                        @endforeach
                    </tbody>
                </table>
                {!! $marca->render() !!}
            </div>
        </form>
    </div>

@endsection