<?php
include('GestionBD/conexion.php');
session_start();


if(isset($_REQUEST['alta'])) { // si se ha pulsado el boton de alta del formulario

    $nombre = $_REQUEST['Nombre'];
    $descripcion = $_REQUEST['Descripcion'];
    $precio = $_REQUEST['Precio'];
    $foto = $_REQUEST['Foto']; 

    // Insertar los datos del nuevo articulo
    $sql = "INSERT INTO Articulos (Nombre, Descripcion, Precio, Foto) VALUES ('$nombre', '$descripcion', '$precio', '$foto')";
    $resultado = mysqli_query($conn, $sql);

    if($resultado) {
        echo "El artículo se ha añadido correctamente."; //mensahe de confirmacion
    } else {
        echo "Error al añadir el artículo: " . mysqli_error($conn); //mensaje de error en caso de fallar
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Artículo</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div id="contenedor">
        <div id="central">
            <div id="login">
                <div class="titulo">
                    Alta Artículo
                </div>
                <form id="altaForm" action="" method="post">
                    <input type="text" name="Nombre" placeholder="Nombre" required>
                    <textarea name="Descripcion" placeholder="Descripción" required></textarea>
                    <input type="number" name="Precio" placeholder="Precio" required>
                    <input type="file" name="Foto" placeholder="Ruta de la foto" > 
                    <button type="submit" name="alta">Alta</button>
                </form>
                <div class="inferior">
                    <a href="catalogo.php">Volver</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>