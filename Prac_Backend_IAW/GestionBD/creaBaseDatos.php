<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Crea la conexión al SGBD
    $conn = mysqli_connect($servername, $username, $password);
    // Comprueba si la conexión se ha establecido
    if (!$conn) {
        die("Conexion fallida: " . mysqli_connect_error());
    }

    // Aquí solo llegamos si la conexión se ha establecido, entonces se crea la tabla IAW
    $sql = "CREATE DATABASE TIENDA";
    if (mysqli_query($conn, $sql)) {
        echo "Base de datos creada con exito";
    } else {
        echo "Error creando la base de datos: " . mysqli_error($conn);
    }

	mysqli_close($conn);
?>
