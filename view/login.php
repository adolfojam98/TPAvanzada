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
    <link href="css/styles.css" rel = "stylesheet" type="text/css"><!--Estilo-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script><!--Esto es para el CAPTCHA-->
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  <!-- Iconos -->
    

  </head>

<body background="imagenes/fondo.jpg">
	<header>
    <?php
			require "html/header.html";//Esto es para que te aparezca la fotito de arriba, llama al script header.php
	  ?>
  </header>
  <h1>INGRESAR AL SISTEMA</h1>
  <hr width="50%" align="center" color="#2B726C" size="3px">
  <div id="div-form"> 
    <form class="col s12" action="../controller/procesosLogin.php" method="post"> <!--Aca empieza todo lo que es el formulario-->
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input type="text" class="validate" name="email" id="icon_prefix" required>
          <label for="icon_prefix">Usuario</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">vpn_key</i>
          <input id="password" type="password" class="validate" name="password" required>
          <label for="password">Contraseña</label>
        </div>
        <div id="div-captcha" align="center" class="col s12">
          <div class="g-recaptcha" data-sitekey="6LcktLwUAAAAAM03095kUEzpBRilLGGeUERMx_rE"></div>
        </div>
      </div>
      <div class="row">
        <div align="center" class="col s12">
          <button class="btn waves-effect waves-light" type="submit" name="action">Ingresar
            <i class="material-icons right">send</i>
          </button>
        </div>
        <div align="center" class="col s12">
          <br>
          <p>Todavía no tenés una cuenta?</p>
          <a href="registro.php" class="waves-effect waves-light btn-small">Registrarse</a>
        </div>
      </div>
    </form>
  </div>

  <footer>
    <?php
		  require "html/footer.html"; //Esto es para llamar a la fotito de abajo
	  ?>
  </footer>
</body>
</html>