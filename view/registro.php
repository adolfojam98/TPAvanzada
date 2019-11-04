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
    <title>Registro</title>

    <link href="css/styles.css" rel = "stylesheet" type="text/css"><!--Estilo-->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  <!-- Iconos -->
  </head>
  <body background="imagenes/fondo5.jpg">
    <div id="div-registro">
    <div id="transparente" class="card">
      <div class="card-action"> <h5>Crea tu cuenta</h5> </div>
      <div class="card-content"> 
      <form id="registro" action="../controller/registroController.php" method="post" enctype ="multipart/form-data">
          <div class="input-field col s12">
            <input name="nombre" id="first_name" type="text" class="validate" required>
            <label for="first_name">Nombre</label>
          </div>
          <div class="input-field col s12">
            <input id="last_name" name="apellido" type="text" class="validate" required>
            <label for="last_name">Apellido</label>
          </div>
          <div class="input-field col s12">
            <input name="usuario" id="first_name2" type="text" class="validate" required>
            <label for="first_name2">Usuario</label>
          </div>
          <div class="input-field col s12">
            <input id="password" name="contrasenia1" type="password" class="validate" required>
            <label for="password">Contraseña</label>
          </div> 
          <div class="input-field col s12">
            <input id="password2" name="contrasenia2" type="password" class="validate" required>
            <label for="password2">Repita la contraseña</label>
          </div>
          <div class="input-field col s12">
            <div class="file-field input-field">
              <div class="btn light-green darken-3">
                <span>Archivo</span>
                <input type="file" name="fotoPerfil" id="fotoPerfil">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" id="imgPerfil" name="imgPerfil">
                <label for="imgPerfil">Imagen de perfil</label>
              </div>
            </div>
          </div>
          <div align="center" class="col s12">
            <button class="btn waves-effect waves-light light-green darken-3" type="submit" name="action">Enviar</button>
            <a href="login.php" class="btn waves-effect waves-light light-green darken-3">Cancelar</a>
          </div>
        </form>
      </div>
      </div>
    </div>
  </body>
</html>
