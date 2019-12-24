<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{asset('css/stylos.css')}}" rel="stylesheet">
        <link href="{{asset('css/datatables.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/bootstrap-grid.css')}}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/font-awesome-4.7.0/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">

        <title>@yield('title','Default') | Panel de Administracion Sistema de Inventario</title>
    </head>
    <body>
          
        <main>
                <header> 
                        <nav class="men">
                            <a href="#" class="enlaceLogo" >Respuestos El Triunfo</a>
                            <ul>
                                <li>
                                    <label class="labl" for="">Sistema de Inventario Repuestos El Triunfo</label>
                                </li>
                            </ul>   
                        </nav>

                    </header>
            <div class="content-all">
                    
                <article>
                    <div class="container">
                        <div class="container">
                            <div class="formulario">
                                <div class="cabeceraForm">
                                    <h1 style="color: white">Acceso Denegado</h1>
                                </div>
                                <strong class="text-center" style="padding: 1em">
                                    <p class="text-center">
                                        Estimado usuario, usted no tiene acceso a esta zona
                                    </p>
                                </strong>
                                <strong style="background: #1a2537;padding: 1em">
                                    <p>
                                        <a href="{{route('logout')}}">Regresar al Login</a>
                                    </p>    
                                </strong>
                    
                            </div>
                        </div>                    
                    </div>
                </article>

            </div>

            <footer class="cabecera">
                <ul>
                    <li><h3>Diseñado y Desarrollado Por:</h3></li>
                    <li><h4>Kevin Antonio Talavera</h4></li>
                    <li><h4>Israel Levi Espinal</h4></li>
                </ul>
            </footer>
        </main>
        @include('sweetalert::alert')    
    @yield('js')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    //<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="{{asset('js/dropdown.js')}}"></script>
    <script src="{{asset('js/datatables.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    
    <script>

        
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");
            
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            
            // When the user clicks the button, open the modal 
            btn.onclick = function() {
              modal.style.display = "block";
            }
            
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }

            $('#myModal').on('show', function () {
                $('#codigo').focus();
             });
             
            $('input[type="search"]').addClass('input-contenedor');

             $(document).ready( function () {
                $('#productos').DataTable({
                    "paging":   false,
                    "ordering": false,
                    "info":     false,
                    "language": {
                        "lengthMenu": "Display _MENU_ records per page",
                        "zeroRecords": "Registro No Encontrado",
                        "info": "Showing page _PAGE_ of _PAGES_",
                        "infoEmpty": "No records available",
                        "infoFiltered": "(filtered from _MAX_ total records)",
                        "search":"Buscar: "
                    }
                });
            });
    </script>

    <script>
            var close = document.getElementsByClassName("closebtn");
            var i;
            
            // Loop through all close buttons
            for (i = 0; i < close.length; i++) {
              // When someone clicks on a close button
              close[i].onclick = function(){
            
                // Get the parent of <span class="closebtn"> (<div class="alert">)
                var div = this.parentElement;
            
                // Set the opacity of div to 0 (transparent)
                div.style.opacity = "0";
            
                // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
                setTimeout(function(){ div.style.display = "none"; }, 600);
              }
            }
    </script>
    </body>

</html>
