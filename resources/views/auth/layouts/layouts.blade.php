<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="{{asset('css/formStyle.css')}}">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
</head>
<body>
    @yield('contenido')
</body>
<script type="text/javascript">
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
</html>