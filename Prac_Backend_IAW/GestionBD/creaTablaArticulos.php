<?php
    include ("conexion.php");
    
     $sql_Articulos = "CREATE TABLE IF NOT EXISTS Articulos (
    id_Articulo INT  AUTO_INCREMENT PRIMARY KEY, 
    Nombre VARCHAR(30) NOT NULL,
    Descripcion VARCHAR(30) NOT NULL,
    Foto VARCHAR(600) NOT NULL,
    Precio int not null
    );";

    $Resultado= mysqli_query($conn, $sql_Articulos);

    if ($Resultado)
    {
        echo "Tabla Articulos creada con exito";
    } else 
    {
        echo "Error creando la tabla: " . mysqli_error($conn);
    }
    
?>
