<?php
include('GestionBD/conexion.php');
session_start();

// Verificar si se ha enviado una solicitud en modificar
if(isset($_POST['modificar'])) {
    //obtener datos del form
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $id_articulo = $_POST['id_articulo'];

    // Actualizar los datos del articulo en la base de datos
    $sql = "UPDATE Articulos SET Nombre='$nombre', Descripcion='$descripcion', Precio='$precio' WHERE id_Articulo='$id_articulo'";
    $resultado = mysqli_query($conn, $sql);

    if($resultado) { //comprueba y da mensajes de confirmacion
        echo "Los datos del artículo se han actualizado correctamente.";
    } else {
        echo "Error al actualizar los datos del artículo: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Artículo</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div id="contenedor">
        <div id="central">
            <div id="login">
                <div class="titulo">
                    Modificar Artículo
                </div>
                <form id="loginform" action="" method="post">
                    <?php if(isset($_GET['id'])) { ?> //si el envio del paremetro id se ha enviado correctamente
                        <input type="hidden" name="id_articulo" value="<?php echo $_GET['id']; ?>">
                    <?php } ?>
                    <input type="text" name="nombre" value="<?php if(isset($articulo['Nombre'])) { echo $articulo['Nombre']; } ?>" placeholder="Nombre" required>
                    <textarea name="descripcion" placeholder="Descripción" required><?php if(isset($articulo['Descripcion'])) { echo $articulo['Descripcion']; } ?></textarea>
                    <input type="number" name="precio" value="<?php if(isset($articulo['Precio'])) { echo $articulo['Precio']; } ?>" placeholder="Precio" required>
                    <button type="submit" name="modificar">Modificar</button>
                </form>
                <div class="inferior">
                    <a href="catalogo.php">Volver</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>