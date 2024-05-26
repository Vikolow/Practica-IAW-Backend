<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!doctype html>

<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">
    
    <head>
        
        <meta charset="utf-8">
        
        <title> Alta Nuevo Usuario </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta name="author" content="Videojuegos & Desarrollo">
        <meta name="description" content="Muestra de un formulario de acceso en HTML y CSS">
        <meta name="keywords" content="Formulario Acceso, Formulario de LogIn">
        
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/login.css">
        
        <style type="text/css">
            
        </style>
        
        <script type="text/javascript">
        
        </script>
        
    </head>
    
    <body>
        <?php 
            include("GestionBD/conexion.php");
             // Obtener los valores del formulario
            if(isset($_REQUEST['Ingresar'])){ 
                $nombre=$_REQUEST['nombre'];
                $apellidos=$_REQUEST['apellidos'];
                $direccion=$_REQUEST['direccion'];
                $fecha_nac=$_REQUEST['Fecha_Nac'];
                $tel=$_REQUEST['telefono'];
                $email=$_REQUEST['email'];
                $url=$_REQUEST['url'];
                $contraseña=$_REQUEST['contraseña'];
                // crear consulta sql
            
                $sql = "INSERT INTO Usuarios (Nombre, Apellidos, Fecha_Nac, Telefono, URL, email, Contraseña) VALUES ('$nombre', '$apellidos', '$fecha_nac', '$tel', '$url', '$email', '$contraseña')";

                // ejecutar consulta y comprobar resultados
                if(mysqli_query($conn,$sql)){
                    header("Location: Alta_Conf.php");
                }else{
                    die("No se ha podido actualizar los registros".mysqli_error($conn));
                }
            }else{
                ?>
        <div id="contenedor">
            <div id="central">
                <div id="login">
                    <div class="titulo">
                        Bienvenido
                    </div>
                    <form id="AltaUsuario" action="" method="post">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="caja" autofocus required placeholder="Nombre" title="Mayusculas y minusculas sin espacios">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" id="apellidos" name="apellidos" class="caja" required pattern="[a-zA-Z\s]+" placeholder="Apellidos" title="Mayusculas y minusculas con espacios">
                        <label for="direccion">Dirección:</label>
                        <input type="text" name="direccion" id="direccion" class="caja"required placeholder="Dirección" title="indica nombre de vía">
                        <label for="Fecha_Nac">Fecha de Nacimiento:</label>
                        <input type="date" name="Fecha_Nac" id="Fecha_Nac" class="caja" placeholder="Fecha Nacimiento" title="Fecha Nacimiento">
                        <label for="telefono">Teléfono: </label>
                        <input type="tel" name="telefono"  id="telefono" class="caja"  placeholder="Telefono"  title="+codigo pais y empieza por 6" required>
                        <label for="email">e-Mail:</label>
                        <input type="email" name="email" id="email" required class="caja" placeholder="email" title="incluye @ y dominio">
                        <label for="url">URL:</label>
                        <input type="url" class="caja" name="url" id="url" placeholder="Escribe la URL de tu página web personal" title="debe ser una url válida">
                        
                        <labebuttonl for="contraseña">Contraseña:</label> 
                        <input type="password" name="contraseña" class="caja" required placeholder="Contraseña" title="Sin restricciones ">
                        <button type="submit" title="AltaUsuario" name="Ingresar">Alta Usuario</button>
                    </form>
                    <div class="pie-form">
                        <a href="login.php">Volver</a>
                    </div>
                </div>
            </div>    
        </div>
        <?php
            }
        ?>
    </body>
</html>