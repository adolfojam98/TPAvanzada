<?php
session_start();
if(!$_SESSION["id"]){
    header("Location:incio.php");
}
$idM = $_GET["idMascota"];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar mascota</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  <!-- Iconos -->
</head>
<body>
    <div class="navbar-fixed">
    <nav class="light-green darken-3">
        <div class="nav-wrapper container">
            <a href="actualizarMascota.php" class="brand-logo">Editar mascota</a>
            <ul class="right">
                <li><a href="tablaUsuarios.php">Ver usuarios</a></li>
                <li><a href="misMascotas.php">Ver mis mascotas</a></li>
                <li><a href="ActualizarPerfil.php">Editar perfil</a></li>
                <li><a href="../controller/cerrarSesion.php">Cerrar sesión</a></li>
            </ul>
        </div>
    </nav>
    </div>
    <div id="div-boton">
        <a class="btn-floating btn-large lime" href="misMascotas.php" title="Volver"><i class="material-icons">navigate_before</i></a>
    </div>
    <div id="div-contenido">
        <div class="row">
            <form action="../controller/modificarMascota.php?idMascota=<?php echo $idM;?>" method="post" enctype ="multipart/form-data">
                <input type="text" name="mascota_nuevoNombre" id="mascota_nuevoNombre" placeholder="Ingrese nombre de su mascota">
                <div class="file-field input-field">
                    <div class="btn light-green darken-3">
                        <span>Archivo</span>
                        <input type="file" name="actualizarFoto_mascota" id="actualizarFoto_mascota">
                    </div>
                    <div class="file-path-wrapper">
                        <input placeholder="Imagen de perfil" class="file-path validate" type="text">
                    </div>
                </div>
                <div align="center">
                    <button class="btn waves-effect waves-light lime" type="submit" name="action">Aceptar</button>
                    <a href="misMascotas.php" class="btn waves-effect waves-light lime">Cancelar</a>
                </div>
            </form>
      </div>
    </div>
</body>
</html>