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
<?php 
session_start();
$mensaje="";
include ('GestionBD/conexion.php');

if ($conn) { //si la conexion funciona correctamente , ejecutara esto
    $mensaje=""; //inicializamos mensaje con un campo vacio para evitar problemas
    if(isset($_REQUEST['Ingresar'])){ //Si se ha pulsado el boton Ingresar
        $nombre= $_REQUEST['usuario'];
        $sql = "SELECT * FROM usuarios WHERE Nombre='$nombre';"; 
        $resultado = mysqli_query($conn, $sql);
        $contraseña = $_REQUEST['password'];
            if(mysqli_num_rows($resultado) > 0){
                $row=mysqli_fetch_assoc($resultado);
                if($row['Contraseña'] == $contraseña){
                    header("Location: catalogo.php");
                    $_SESSION['usuario'] = $row['Nombre']; //almacenamos el nombre de usuario en una sesion 
                }else{
                    $mensaje= "Contraseña erronea"; //si la contraseña no coincide con el registro en la bdd
                }
        
            }else{
                $mensaje="Usuario incorrecto"; //Si el usuario no se encuentra en la bdd
            }
           echo $mensaje;  // printar la variable mensaje sea cual sea su valor
        }else{
    ?>
        <body >
            <div id="contenedor">
                <div id="central">
                    <div id="login">
                        <div class="titulo">
                            Acceso a la tienda
                        </div>
                        <form id="login" action="" method="post">
                            <input type="text" name="usuario" placeholder="Usuario" required>
                            <input type="password" placeholder="Contraseña" name="password" required>
                            <button type="submit" title="Ingresar" name="Ingresar">Login</button>
                        </form>
                        <div class="pie-form">
                            <a href="recuperar.php">Recuperar contraseña</a>
                            <a href="AltaUsuario.php">Pulsa aquí para Registrate</a>
                        </div>
                    </div>
                </div>
            </div>   
        </body>
    </html>
    <?php 
        }
    
} 

else {
    die("Conexion fallida: " . mysqli_connect_error());
}
?>