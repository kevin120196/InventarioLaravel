<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="{{asset('css/formStyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-grid.css')}}">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
                @yield('contenido')
        </div>
    </div>
</body>
    <script src="{{asset('js/jquery-3.4.1.js')}}"></script>
    
    <script type="text/javascript">
        var close = document.getElementsByClassName("closebtn");
        var i;

        for (i = 0; i < close.length; i++) {
            close[i].onclick = function(){
                var div = this.parentElement;
                div.style.opacity = "0";
                setTimeout(function(){ div.style.display = "none"; }, 600);
            }
        }

        $(".input-contenedor input").on("focus",function(){
            $(this).addClass("focus");
        });

        $(".input-contenedor input").on("blur",function(){
            if($(this).val()=="")
            $(this).removeClass("focus");
        });

        $(".input-contenedor2 input").on("focus",function(){
            $(this).addClass("focus2");
        });

        $(".input-contenedor2 input").on("blur",function(){
            if($(this).val()=="")
            $(this).removeClass("focus2");
        });

        function showcont(){
            var pw = document.getElementById('password')
            if (pw.type == "text" )
                pw.type ="password";
            else
                pw.type ="text";
        }

    </script>

    @yield('js')
</html>