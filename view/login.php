<?php
  session_start();
  $_SESSION["captcha"] = false;
  if(isset($_SESSION["validate"])){
    if($_SESSION["validate"]== true){
        header("Location:inicio.php");
    }
  }
?>

<!DOCTYPE html>
<html>
<head><!--Aca se identifica lo que va a ser el html-->
    <meta charset="UTF-8"><!--Tipo de codificacion de los simbolos-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Nose que hace-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge"><!--Esto tampoco-->
    <title>Login</title><!--El nombre que aparece arriba en la pestaña-->
    <link href="https://fonts.googleapis.com/css?family=Coming+Soon&display=swap" rel="stylesheet"><!--Esto es para la letra que se entrelaza con css-->
    <link href="https://fonts.googleapis.com/css?family=McLaren&display=swap" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" type="text/css"><!--Estilo-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script><!--Esto es para el CAPTCHA-->
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  <!-- Iconos -->
    

  </head>

<body background="imagenes/fondo2.jpg" style="background-size:cover">
  <div id="div-login"> 
    <div id="transparente" class="card">
      <div class="card-action"> <h5>Ingresa a tu cuenta</h5> </div>
      <div class="card-content"> 
        <form id="login" action="../controller/procesosLogin.php" method="post"> <!--Aca empieza todo lo que es el formulario-->
        <!-- style="background: rgba(100,100,100,.7);" -->
          <div class="input-field col s12">
            <i class="material-icons prefix">person</i>
            <input type="text" class="validate" name="email" id="icon_prefix" required>
            <label for="icon_prefix">Usuario</label>
          </div>
          <div class="input-field col s12">
            <i class="material-icons prefix">lock</i>
            <input id="password" type="password" class="validate" name="password" required>
            <label for="password">Contraseña</label>
          </div>
          <div id="div-captcha" align="center" class="col s12">
            <div class="g-recaptcha" data-sitekey="6LcktLwUAAAAAM03095kUEzpBRilLGGeUERMx_rE"></div>
          </div>
          <div align="center" class="col s12">
            <button class="btn waves-effect waves-light light-green darken-3" type="submit" name="action">Ingresar
              <i class="material-icons right">send</i>
            </button>
          </div>
          <div align="center" class="col s12">
            <br>
            <p>Todavía no tenés una cuenta?</p><br>
            <a href="registro.php" class="waves-effect waves-light btn-small light-green darken-3">Registrarse</a>
          </div>
        </form> 
      </div>
    </div>
  </div>
</body>
</html>