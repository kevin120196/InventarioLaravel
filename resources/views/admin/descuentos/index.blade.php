@extends('admin.template.template')
@section('title','Gestion de Categorias')
@section('contenido')

    <div class="row">
        <div class="formulario" style="box-shadow: none;padding:3px" >
                <div class="cabeceraForm">
                    <h1>Gestion de Descuentos</h1>
                </div>

                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="input-contenedor input-100" style="border: none;">
                                <a href="{{route('descuentos.create')}}" class="button-primary">Nuevo Descuento</a>
                            </div>
                        </div>
                    </div>
                    <div class="main-container">
                        <table class="descuento">
                            <thead>
                                <tr>
                                    <th>Descuento</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($descuento_cliente as $descuento)
                                    
                                    <tr> 
                                        <td>{{$descuento->descuento_cliente}}</td>                            
                                        <td>
                                            <a href="{{route('descuentos.edit',$descuento->id)}}" class="button-warning"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('admin.descuentos.destroy',$descuento->id)}}" class="button-danger" onclick="return confirm('¿Seguro que deseas eliminar este registro?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                        {!! $descuento_cliente->render() !!}
                    </div>
            </div>
    </div>

@endsection

