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
    header('location: controller/redirec.php');
  }

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>



  </head>
  <body>

  <form action="../controller/registroController.php" method="post">
  
  <input type="text" name="nombre" id="nombre" placeholder="Ingrese nombre">
  <input type="text" name="apellido" id="apellido" placeholder="Ingrese apellido">
  <input type="text" name="usuario" id="usuario" placeholder="ingrese nombre de usuario">
  <input type="password" name="contrasenia1" id="contrasenia1" placeholder="Ingrese contraseña"> 
  <input type="password" name="contrasenia2" id="contrasenia2" placeholder="Ingrese nuevamente contraseña">
  <input type="submit" value="Enviar">

 </form>
  </body>
</html>
