<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap-grid.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>


            .input-contenedor{
                margin-bottom: 15px;
                border: 1px solid #aaa;
                display: flex;
                flex-wrap: wrap;
                grid-auto-columns: 2;
                float: left;
            
            }

            input[type="date"]{
                font-size: 20px;
                width: 80%;
                margin: auto;
                margin-left: 1px;
                padding: 7px;
                border: none;
                outline: none;
                color: #757575;
            }
            
            input[type="number"]{
                font-size: 20px;
                width: 79%;
                margin: auto;
                margin-left: 1px;
                padding: 10px;
                border: none;
                outline: none;
                color: #757575;
            }
            
            input[type="text"]:read-only{
                text-transform: capitalize;   
            }
            input[type="email"],
            input[type="text"],
            input[type="password"],
            .button-primary,
            .button-danger,
            .button-show,
            .button-warning
            {
                font-size: 20px;
                width: 80%;
                margin: auto;
                margin-left: 1px;
                padding: 10px;
                border: none;
                outline: none;
            }
            
            .cabeceraForm{
                margin-top: 0px;
                padding: 2em;
                background: #2D3E50;
                border-radius: 6px 6px 0 0 ;
                margin-bottom: 1em;
                color: white;
                text-align: center;
            }
            .contenedor{
                width: 100%;
                padding: 15px;
            }
            
            input[type="date"]{
                font-size: 20px;
                width: 80%;
                margin: auto;
                margin-left: 1px;
                padding: 7px;
                border: none;
                outline: none;
                color: #757575;
            }

            .icon{
                min-width: 50px;
                text-align: center;
                color: #999;
                border-right: 2px solid #999;
                padding:8px 1px 7px 0px;
            }
            .input-10{
                width: 10%;
            }
            
            .input-20{
                width: 20%;
            }
            
            .input-90{
                width: 90%;
            }
            
            .input-100{
                width: 100%;
            }
            .input-90{
                width: 90%;
            }
            
            .input-100{
                width: 100%;
            }
            .main-container{
                margin: 20px -6px;
                width: 100%;
                height: auto;
                overflow: auto;
                }
                table{
                background-color: white;
                width: 100%;
                border: 1px solid whitesmoke;
                text-align: center;
                margin: 7px -7px;
                border-collapse: collapse;
                
                }
                
                th{
                position: sticky;
                top: 0;
                
                }
                
                th,td{
                padding: 20px;
                font-family: 'Montserrat', sans-serif;
                }
                
                thead th{
                background-color: #1a2537;
                border-bottom: solid 5px #dddddd;
                color: white;
                }
                
                
                
                tr:nth-child(even){
                background-color: #ddd;
                
                }
                
                tr:hover td{
                background-color: rgba(255, 255, 255, 0.5);
                color: #606774;
                font-weight: bold;
                }
                
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
            <div class="formulario" style="padding: 1em; margin-top:1px;width: 100%;height: 500px;
    display: inline-grid;">
                    <div class="cabeceraForm">
                            <h1>Factura Venta<h1>
                        </div>
                        <div class="contenedor">
                            <div class="input-contenedor input-50 input-100">
                                <i class="icon"><img src="img/compras (2).png" alt=""></i>
                                {!! Form::text('vendedores_id', $facturaventa->vendedores->nombre_vendedor, ['placeholder'=>'Proveedores','id'=>"estado_factura",'readOnly'])!!}
                            </div>
                
                            <div class="input-contenedor input-50 input-100">
                                <i class="fa fa-calendar icon" aria-hidden="true"></i>
                                {!! Form::text('fecha_factura', $facturaventa->fecha_factura, ['placeholder'=>'Fecha','id'=>"fecha",'readOnly'])!!}
                            </div>
                
                            <div class="input-contenedor input-50 input-100">
                                    <i class="icon"><img src="img/factura (1).png" alt=""></i>                
                                    {!! Form::text('estado_factura', $facturaventa->estado_factura, ['placeholder'=>'Estado Factura','id'=>"estado_factura",'readOnly'])!!}
                            </div>
                
                            <div class="input-contenedor input-50 input-100">
                                <i class="icon"><img src="img/factur.png" alt=""></i>
                                {!! Form::text('tipo_factura_id', $facturaventa->tipos_factura->tipo_factura_nombre, ['placeholder'=>'Estado Factura','id'=>"estado_factura",'readOnly'])!!}
                            </div>
                
                            <div class="input-contenedor input-100">
                                <i class="icon"><img src="img/clientes.png" alt=""></i>        
                                {!! Form::text('clientes_id', $facturaventa->clientes->nombre, ['placeholder'=>'Proveedores','id'=>"estado_factura",'readOnly'])!!}
                            </div>     
                        </div>
                </div>


                <div class="main-container" style="overflow: hidden; margin-left: 1px">
                        <table>
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>precio</th>
                                    <th>Descuento</th>
                                    <th>SubTotal</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($detalle as $detalles)
                                    <tr>
                                        <td>{{$detalles->descripcion}}</td>
                                        <td>{{$detalles->cantidad}}</td>
                                        <td>{{$detalles->precio}}</td>
                                        <td>{{$facturaventa->descuentos_clientes->descuento_cliente}}</td>
                                        <td>{{$detalles->total}}</td>
                                        
                                    </tr>
                                   
                                @endforeach
                            </tbody>
                            <tfoot style="background: #aaa">
                                <tr>
                                    <th><b>Total:</b> {{$facturaventa->totalgeneral}}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
    </div>

</body>
</html>