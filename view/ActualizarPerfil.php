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
    <title>Editar perfil</title>
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
            <a href="ActualizarPerfil.php" class="brand-logo">Editar perfil</a>
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
        <a class="btn-floating btn-large lime" href="inicio.php" title="Volver"><i class="material-icons">navigate_before</i></a>
    </div>
    <div id="div-contenido">
    <div class="row">
      <form action="../controller/editarPerfil.php" method="post" enctype ="multipart/form-data">
          <div class="input-field col s12">
            <input name="nombre_cambio" id="nombre_cambio" type="text" class="validate">
            <label for="nombre_cambio">Ingrese nombre</label>
          </div>
          <div class="input-field col s12">
            <input name="apellido_cambio" id="apellido_cambio" type="text" class="validate">
            <label for="apellido_cambio">Ingrese apellido</label>
          </div>
          <div class="input-field col s12">
            <div class="file-field input-field">
              <div class="btn light-green darken-3">
                <span>Archivo</span>
                <input type="file" name="actualizarFoto" id="actualizarFoto">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" id="imgPerfil" name="imgPerfil">
                <label for="imgPerfil">Ingrese foto</label>
              </div>
            </div>
          </div>
          <div align="center" class="col s12">
            <button class="btn waves-effect waves-light lime" type="submit" name="action">Enviar</button>
            <a href="inicio.php" class="btn waves-effect waves-light lime">Cancelar</a>
          </div>
        </form>
      </div>
</div>
</body>
</html>