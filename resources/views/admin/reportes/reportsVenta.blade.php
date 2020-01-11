<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
            
            label{
                text-transform: capitalize;
                   
            }

            .label1{
                margin-left: 10em;
            }
            .label2{
                margin-left: 6.1em;
            }
            .label3{
                margin-left: 6em;
            }
            .label4{
                margin-left: 7.3em;
            }
            .label5{
                margin-left: 11em;
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
                border-collapse: separate;
                
                }
                
                th{
                position: sticky;
                top: 0;
                
                }
                
                th,td{
                padding: 9px;
                text-transform: capitalize;
                font-family: 'Montserrat', sans-serif;
                }
                
                thead th{
                background-color: #1a2537;
                border-bottom: solid 4px whitesmoke;
                border-top: solid 4px whitesmoke;
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
    <title>Reporte de Venta</title>
</head>
<body>
   <div class="cabeceraForm">
       <h1>Reporte de Ventas</h1>
   </div>
        <div class="main-container">
                <table class="proveedor">
                        <thead>
                            <tr>
                                <th>N° Factura</th>
                                <th>Fecha de Facturacion</th>
                                <th>Estado de Factura</th>
                                <th>Tipo de Factura</th>
                                <th>Cliente</th>
                                <th>Descuento</th>
                                <th>Vendedor</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($venta as $ventas)
                                <tr>
                                    <td>{{$ventas->codigo_factura}}</td>
                                    <td>{{$ventas->fecha_factura}}</td>
                                    <td>{{$ventas->estado_factura}}</td>
                                    <td>{{$ventas->tipos_factura->tipo_factura_nombre}}</td>
                                    <td>{{$ventas->clientes->nombre}}</td>
                                    <td>%{{$ventas->descuentos_clientes->descuento_cliente}}</td>
                                    <td>{{$ventas->vendedores->nombre_vendedor}}</td>
                                    <td>C${{$ventas->total}}</td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <label for="" class=""><b>Impreso por: {{Auth::user()->name}} </b></label><br>
                    <label for="" class=""><b>Elaborado el: <?php echo $dia ?></b></label>

            </div>
</body>
</html>