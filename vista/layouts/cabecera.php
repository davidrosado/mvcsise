<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA DE CONTROL DE HABITACIONES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- ✅ load jQuery (optional) ✅ -->
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>

    <!-- ✅ load popper.js ✅ -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>

    <!-- ✅ load Bootstrap JS ✅ -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>

    <script src="https://kit.fontawesome.com/a993480089.js" crossorigin="anonymous"></script>       
</head>
<body>
   <div class="contenido">
        <div class="container">
            <div class="row py-3">
                <div class="col-12 text-center">
                    <h1>SISTEMA DE CONTROL DE HABITACIONES</h1>
                    <h2 class="mt-3">
                      <?php if($vista) {
                        echo $vista;
                      }?>
                    </h2>
                    <h3> 
                      <?php if($titulo) {
                        echo $titulo;
                      }?></h3>
                </div>      
            </div>     
            <div class="row py-3 justify-content-center">