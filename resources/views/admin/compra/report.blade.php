<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>

            body{
                font-family: 'Montserrat', sans-serif;
                
            }
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
                margin-left: 6.1em;
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

                .etiqueta{
                    font-size: 14px;
                }

                .label6{
                    margin-left: 13.9em;
                }
                
    </style>
    <title>Factura de Compra Nº <?php echo $facturacompra->codigo_factura?></title>
</head>
<body>
   
        <form style="box-shadow: 1px 4px 10px 1px black">
                <div class="cabeceraForm">
                    <div>
                        <img style="width: 250px;height:auto;" src="./img/logoeltriunfo.png" alt="">
                    </div>
                    <h1>Orden de Compra</h1>
                    <h3>Repuestos El Triunfo</h3>
                </div>
                <br>
                <div class="col-md-12">
                        <div class="form-group col-6">
                            <label for=""><b>Nº: </b></label>
                            <label for="" class="label6"><?php echo $facturacompra->codigo_factura?></label>
                        </div>
                        <div class="form-group col-6">
                                <label for=""><b>Proveedor: </b></label>
                                <label for="" class="label1"><?php echo $facturacompra->proveedores->nombre_proveedor?></label>
                        </div>
                        <div class="form-group col-6">
                            <label for=""><b>Fecha Facturación: </b></label>    
                            <label for="" class="label2"><?php echo $facturacompra->fecha_compra?></label>
                        </div>
        
                        <div class="form-group col-6">
                                <label for=""><b>Estado de Factura: </b></label>    
                                <label for="" class="label3"><?php echo $facturacompra->estado_factura?></label>
                        </div>
        
                        <div class="form-group col-6">
                                <label for=""><b>Tipo de Factura: </b></label>
                                <label for="" class="label4"><?php echo $facturacompra->tipoFactura->tipo_factura_nombre?></label>    
                        </div>
                        <br>
                </div>
            </form>
            
            <div class="main-container" style="overflow: hidden">
                <table id="venta" class="detallefact" style="margin-left: 10px">
                    <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>precio</th>
                            <th>SubTotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalleFact as $detalle)
                            <tr>
                                <td>{{$detalle->descripcion}}</td>
                                <td>{{$detalle->cantidad}}</td>
                                <td>C${{$detalle->precio}}</td>
                                <td>C${{$detalle->subtotal}}</td>
                            </tr>
                           
                        @endforeach
                    </tbody>
                    <tfoot style="background: #aaa">
                        
                        <tr>
                            <th><b>Total: </b>C${{$facturacompra->total}}</th>
                        </tr>
                    </tfoot>
                </table>
                <br>
                <label for="" class=""><b class="etiqueta">Impreso por: {{Auth::user()->nameUser}} </b></label><br>
                <label for="" class=""><b class="etiqueta">Elaborado: <?php echo $dia ?></b></label>
        </div>
</body>
</html>