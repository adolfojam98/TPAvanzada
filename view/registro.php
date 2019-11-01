<?php

  /*
    En ocasiones el usuario puede volver al login
    aun si ya existe una sesion iniciada, lo correcto
    es no mostrar otra ves el login sino redireccionarlo
    a su pagina principal mientras exista una sesion entonces
    creamos un archivo que controle el redireccionamiento
  */

  session_start();

  // isset verifica si existe una variable o eso creo xd
  if(isset($_SESSION['id'])){
    header('location:inicio.php');
  }

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>

<!-- TODO: hacer el style de registro -->
    <link href="css/styles.css" rel = "stylesheet" type="text/css"><!--Estilo-->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  <!-- Iconos -->
  </head>
  <body>
    <div class="container" align="center">
    <div class="row">
    <form class="col s12" action="../controller/registroController.php" method="post" enctype ="multipart/form-data">
        <div class="row">
          <div class="input-field col s6">
            <input name="nombre" id="first_name" type="text" class="validate">
            <label for="first_name">Nombre</label>
          </div>
          <div class="input-field col s6">
            <input id="last_name" name="apellido" type="text" class="validate">
            <label for="last_name">Apellido</label>
          </div>
        </div> 
        <div class="row">
          <div class="input-field col s6">
            <input name="usuario" id="first_name2" type="text" class="validate">
            <label for="first_name">Usuario</label>
          </div>
          <div class="input-field col s6">
            <input id="password" name="contrasenia1" type="password" class="validate">
            <label for="last_name">Contraseña</label>
          </div> 
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="password2" name="contrasenia2" type="password" class="validate">
            <label for="last_name">Repita la contraseña</label>
          </div>
          <div class="input-field col s6">
            <div class="file-field input-field">
              <div class="btn">
                <span>Archivo</span>
                <input type="file" name="fotoPerfil" id="fotoPerfil">
              </div>
              <div class="file-path-wrapper">
                <input placeholder="Imagen de perfil" class="file-path validate" type="text">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div align="center" class="col s12">
            <button class="btn waves-effect waves-light" type="submit" name="action">Enviar</button>
          </div>
        </div>
      </form>
  </div>
      
    </div>
  </body>
</html>
