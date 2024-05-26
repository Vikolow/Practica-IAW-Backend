<?php
include('GestionBD/conexion.php');

// Verificar si se ha enviado una solicitud para eliminar el articulo
if(isset($_REQUEST['eliminar'])) {
    if(isset($_REQUEST['id_articulo'])) {
        $id_articulo = $_REQUEST['id_articulo'];

        // Eliminar el articulo d la base de datos
        $sql = "DELETE FROM Articulos WHERE id_Articulo = $id_articulo";
        $resultado = mysqli_query($conn, $sql);

        if($resultado) { // comprueba resultados y redirige
            header("Location: catalogo.php?eliminado=true");
        } else {
            echo "Error al eliminar el articulo: " . mysqli_error($conn);
        }
    } else {
        echo "No se proporciono un ID de artículo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Artículo</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div id="contenedor">
        <div id="central">
            <div id="login">
                <div class="titulo">
                    Confirmar Eliminación
                </div>
                <form id="eliminarForm" action="" method="post">
                    <p>¿Estas seguro de que quieres eliminar este articulo?</p>
                    <?php
                    if(isset($_GET['id'])) {
                        $id_articulo = $_GET['id'];
                        // Realizar una consulta para obtener los detalles
                        $sql_detalles = "SELECT * FROM Articulos WHERE id_Articulo = $id_articulo";
                        $resultado_detalles = mysqli_query($conn, $sql_detalles);
                        
                        if(mysqli_num_rows($resultado_detalles) > 0) {
                            $detalles_articulo = mysqli_fetch_assoc($resultado_detalles);
                            
                            echo "<p class='card-text'>ID del Articulo: " . $detalles_articulo['id_Articulo'] . "</p>";
                            echo "<p class='card-text'>Nombre: " . $detalles_articulo['Nombre'] . "</p>";
                            echo "<p class='card-text'>Descripción:  " . $detalles_articulo['Descripcion'] . "</p>";
                            echo "<p class='card-text'>Precio: €" . $detalles_articulo['Precio'] . "</p>";
                         
                        } else {
                            echo "No se encontraron detalles para el artículo con ID $id_articulo.";
                        }
                    }
                    ?>
                    <button type="submit" name="eliminar">Eliminar</button>
                    <a href="catalogo.php">Cancelar</a>
                    <?php
                    // Verificar si $id_articulo está definido
                    if(isset($id_articulo)) {
                        // Imprimir el input hidden si $id_articulo está definido
                        echo "<input type='hidden' name='id_articulo' value='$id_articulo'>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>