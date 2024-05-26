
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
                      //Verifica si se ha proporcionado el parametro 'usuario atraves de GET
                      if(isset($_GET['usuario'])) {
                        $usuario = $_GET['usuario'];
                        echo "Contraseña restablecida para el usuario: $usuario"; //Si obtiene el parametro desde la url , usa GET para mostrar el parametro enviado en recuperar.php
                    } else {
                        echo "No se proporciono un nombre de usuario."; // Si no se proporciono el paramtro muestra mensaje error
                    }
                    ?>
                </div>
                <div class="pie-form">
                     <a href="login.php">incio</a>
                </div>   
            </div>
        </div>
        
    </body>
</html>
