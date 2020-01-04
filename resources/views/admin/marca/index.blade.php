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
                    <div class="input-contenedor input-100" style="border: none;">
                        <a href="{{route('marcas.create')}}" class="button-primary">Nueva Marca</a>
                    </div>
                </div>
            </div>
            <div class="main-container">
                <table id="marca">
                    <thead>
                        <tr>
                            
                            <th>Marca</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($marca as $marcas)
                            
                            <tr> 
                                
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