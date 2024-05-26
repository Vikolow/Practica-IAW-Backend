<?php
include('GestionBD/conexion.php');
session_start();

if(isset($_SESSION['usuario'])) { //Si hay una sesion de usuario activa
    if(isset($_REQUEST['restablecer'])) { //Si se ha pulsado el boton restablecer
        $usuario = $_SESSION['usuario'];
        $contraseña = $_REQUEST['contraseñas'];

        $comprobar = "SELECT * FROM Usuarios WHERE Nombre = '$usuario'";
        $resultado_comprobar = mysqli_query($conn, $comprobar);
        
        if(mysqli_num_rows($resultado_comprobar) > 0) { //comprueba si el numero de resultados es mayor que 0
            $sql = "UPDATE Usuarios SET Contraseña ='$contraseña' WHERE Nombre = '$usuario'";
            $resultado_actualizacion = mysqli_query($conn, $sql);

            if($resultado_actualizacion) { // Si la consulta se ejecuta con exito , muestra mensaje de confirmacion y hace exit
                header("Location: restablecer.php?usuario=$usuario");
                exit(); 
            } else {
                echo "Error al actualizar la contraseña."; //Si la consulta fallase
            }
        } else {
            echo "El usuario no existe en la base de datos."; // Si el usuario no existe en la base de datos
        }
    } else {
        $usuario = $_SESSION['usuario']; //Obtener el nombre de usuario de la sesion
?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Recuperar contraseña</title>
            <link rel="stylesheet" href="css/login.css">
        </head>
        <body>
            <div id="contenedor">
                <div id="central">
                    <div id="login">
                        <div class="titulo">
                            Recuperar contraseña
                        </div>
                        <form id="loginform" action="" method="post">
                            <input type="text" name="user" value="<?php echo  $usuario; ?>" readonly>
                            <input type="password" name="contraseñas" placeholder="Nueva Contraseña" required>
                            <button type="submit" title="restablecer" name="restablecer">Restablecer</button>
                        </form>
                        <div class="inferior">
                            <a href="login.php">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
<?php
    }
} else {
    // Si no se ha inicado sesion , mostrar un mensahe de error
    echo "No se ha proporcionado un nombre de usuario.";
}
?>