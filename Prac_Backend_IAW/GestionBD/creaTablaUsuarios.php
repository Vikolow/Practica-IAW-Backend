<?php
    include ("conexion.php");
    
    
    
    $sql_usuarios = "CREATE TABLE IF NOT EXISTS Usuarios (
    id_Usuario INT  AUTO_INCREMENT PRIMARY KEY, 
    Nombre VARCHAR(30) NOT NULL UNIQUE,
    Apellidos VARCHAR(30) NOT NULL,
    Fecha_Nac date,
    Telefono VARCHAR(12) NOT NULL,
    URL VARCHAR(100),
    email VARCHAR(100),
    Contraseña VARCHAR(100),
    reg_date TIMESTAMP
    );";
   
    $Resultado= mysqli_query($conn, $sql_usuarios);

    if ($Resultado)
    {
        //echo "$sql_Articulos <br>";
        echo "Tabla Usuarios creada con exito";
    } else 
    {
        echo "Error creando la tabla: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
