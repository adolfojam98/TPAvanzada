<?php
session_start();
if(!$_SESSION["id"]){
    header("Location:incio.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="../controller/editarPerfil.php" method="post" enctype ="multipart/form-data">
    <input type="text" name="nombre_cambio" id="nombre_cambio" placeholder="ingrese nombre">
    <input type="text" name="apellido_cambio" id="apellido_cambio" placeholder = "ingrese apellido">
    <input type="file" name="actualizarFoto" id="actualizarFoto" placeholder = "ingrese foto">
    <input type="submit" value="enviar">
    </form>
</body>
</html>