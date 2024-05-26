
<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!doctype html>

<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">
    
    <head>
        
        <meta charset="utf-8">
        
        <title> Login </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/login.css">
        
    </head>
   
    <body> 
        <div id="contenedor">
            <div class="central">
                <div class="titulo">
                  <?php
                        echo "Alta realizada con exito";
                    ?>
                </div>
                
                <div class="pie-form">
                     <a href="login.php">incio</a>
                </div>   
            </div>
        </div>       
        
        <div class="pie-form">
                <a href="login.php">incio</a>
         </div>   
    </body>
</html>

