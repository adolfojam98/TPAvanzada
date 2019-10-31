<?php
    session_start();

    if(isset($_SESSION["validate"])){
        if($_SESSION["validate"] == false){
            header("Location:login.php");
        }
    }else{
        header("Location:login.php");
    } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>incio</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>

<body background="imagenes/fondo.jpg">
    <header>
        <?php
            require "html/header.html"; //Esto es para que te aparezca la fotito de arriba, llama al script header.php
        ?>
    </header>
    <p align="center" class="texto">
        BIENVENIDO/A <?php echo $_SESSION["user"]; ?>
    </p>
    <hr width="50%" align="center" color="#2B726C" size="3px">
    <div id="correcto">
        <img src="imagenes/correcto.png" width="300" height="300" class="imgC" />
    </div>
    <div id="div-boton" align="center">
        <input type="submit" value="Cerrar sesión" onclick="location.href='../controller/cerrarSesion.php'">
    </div>
    <!-- TODO: hacer lindo este link -->
    <a href="tablaUsuarios.php">IR A USUARIOS</a>
    <div>
    </div>
    <footer>
        <?php
            require "html/footer.html"; //Esto es para llamar a la fotito de abajo
        ?>
    </footer>
</body>
</html>