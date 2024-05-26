
<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!doctype html>
<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">
    
    <head>
        <meta charset="utf-8">
        <title> Catálgo </title>    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/login.css">
        <!-- Link hacia el archivo de estilos de bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
        <script src="script.js"></script>
    </head>
    
    <body class="fondo">
        <!-- Link hacia las librerias jsp de bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
           
        <div class="titulo2">Catalogo de productos </div>
        <div id="contenedor2">
        <?php
         session_start();
         include ('GestionBD/conexion.php');
      
         $sql = "SELECT * FROM articulos"; //consulta sql para obtener todos los articulos
         $resultado =  mysqli_query($conn, $sql);
         $usuario = $_SESSION['usuario']; //obtener tipo de usuario de la sesion
          if (mysqli_num_rows($resultado) > 0) { //se ejecutara mientras el num de resultados sea mayor a 0
            while ($row = mysqli_fetch_assoc($resultado)) {
              echo "<div>";
              echo "<div class='card' style='width: 18rem; margin: 10px;'>";
              echo "<img src='" .$row['Foto'] ."' class='card-img-top' alt='img1'>";
              echo "<div class='card-body'>";
              echo "<h5 class='card-title'>". $row['Nombre']. "</h5>";
              echo "<p class='card-text'>" . $row['Descripcion'] . "</p>";
              echo "<p class='card-text'>Precio: <label name='Precio1'>". $row['Precio'] . "</label></p>";
              echo "</div>";
              echo "<ul class='list-group list-group-flush'>";
              echo "<li class='list-group-item'>";
              echo "<label for='cantidad1'> Cantidad: </label>";
              echo "<input  type='number' id='cantidad1' style='width: 80px;'>";
              echo "<input  type='button' id='cantidad1' class='boton' name='Añadir1' value='Añadir' onclick='ProdAdd('prod1','151')'>";
              echo "</li>";
              echo "</ul>";
              // Si el usuario es admin , muestra los botones de eliminar y modificar
            if ($usuario == "admin") {
              echo "<a href=eliminar.php?id=" . $row["id_Articulo"] . ">Eliminar</a>";
              echo "<a href=modificar.php?id=". $row["id_Articulo"] . ">Modificar</a>";
            }
            echo "</div>";
            echo "</div>";
          }
        } else {
          echo "0 resultados"; // en caso de no obtener resultados en la base de datos
        }
        echo "</div>";
        echo "</div>";
        ?>
        <?php
        // Si el usuario es admin , muestra el boton de añadir articulo
        if ($usuario == "admin") {
            echo '<a href="Añadir_art.php"> Añadir artículo</a>';
        }
        

        ?>
                 
        <span id="contenedor2">
            <h5><a href="login.php"> Inicio </a></h5>
        </span>         
    </body>
</html>