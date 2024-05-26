<?php
    include ("conexion.php");

    $sql_Articulos = "INSERT INTO Articulos (Nombre, Descripcion, Foto, Precio)
    VALUES ('Artículo 1', 'Descripcion 1', './images/imagen1.jpg', 1001);";
    $sql_Articulos .= "INSERT INTO Articulos (Nombre, Descripcion, Foto, Precio)
    VALUES ('Artículo 2', 'Descripcion 2', './images/imagen2.jpg', 1002);";
    $sql_Articulos .= "INSERT INTO Articulos (Nombre, Descripcion, Foto, Precio)
    VALUES ('Artículo 3', 'Descripcion 3', './images/imagen3.jpg', 1003);";

    $Resultado= mysqli_multi_query($conn, $sql_Articulos);

    if ($Resultado)
    {
        echo "3 Artículos añadidos correctamente";
    } 
    else 
    {
        echo "Error: " . $sql_Articulos . "<br>" . mysqli_error($conn);
    }
  
    mysqli_close($conn);
?>