<?php
    include ("conexion.php");

    
  
    $sql_Usuarios = "INSERT INTO Usuarios (Nombre, Apellidos, Fecha_Nac, Telefono, URL, email, Contraseña)
    VALUES ('Nombre 1', 'Apellido 1', 2000-01-01, '+34.600.00.01', 'url1', 'usuario1@mail.com', 'pwd1');";
    
    $sql_Usuarios .= "INSERT INTO Usuarios (Nombre, Apellidos, Fecha_Nac, Telefono, URL, email, Contraseña)
        VALUES ('Nombre 2', 'Apellido 2', 2000-01-02, '+34.600.00.02', 'url2', 'usuario2@mail.com', 'pwd2');";
    
    $sql_Usuarios .= "INSERT INTO Usuarios (Nombre, Apellidos, Fecha_Nac, Telefono, URL, email, Contraseña)
    VALUES ('Nombre 3', 'Apellido3', 2000-01-03, '+34.600.00.03', 'url3', 'usuario3@mail.com', 'pwd3');";

    $sql_Usuarios .= "INSERT INTO Usuarios (Nombre, Apellidos, Fecha_Nac, Telefono, URL, email, Contraseña)
    VALUES ('Nombre 4', 'Apellido4', 2000-01-04, '+34.600.00.04', 'url4', 'usuario1@mail.com', 'pwd4');";
    
    $sql_Usuarios .= "INSERT INTO Usuarios (Nombre, Apellidos, Fecha_Nac, Telefono, URL, email, Contraseña)
    VALUES ('Nombre 5', 'Apellido5', 2000-01-05, '+34.600.00.05', 'url5', 'usuario1@mail.com', 'pwd5');";

    $Resultado= mysqli_multi_query($conn, $sql_Usuarios);

    if ($Resultado)
    {
        echo "5 Usuarios añadidos correctamente";
        
    } 
    else 
    {
        echo "Error: " . $sql_Usuarios . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>