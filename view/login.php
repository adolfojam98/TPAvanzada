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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--Para poner iconos en inputs-->
    

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
    <form action="../controller/procesosLogin.php" method="post"><!--Aca empieza todo lo que es el formulario-->
      <div class="inputConIcono">
        <input class="inputs" type="text" name="email" id="email" placeholder="Usuario" autofocus size="40px" required>
        <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i> 
      </div>
      <div class="inputConIcono">
        <input class="inputs" type="password" name="password" id="password" placeholder="Contraseña" size="40px" required>
        <i class="fa fa-key fa-lg fa-fw" aria-hidden="true"></i>
      </div>
      <div id="div-captcha" align="center">
        <div class="g-recaptcha" data-sitekey="6LcktLwUAAAAAM03095kUEzpBRilLGGeUERMx_rE"></div>
      </div>
      <div id="div-boton" align="center">
        <input type="submit" value="Enviar">
      </div>
    </form>  
  </div>

  <div>
    <a href="registro.php">Registrarse</a>
  </div>
  <footer>
    <?php
		  require "html/footer.html"; //Esto es para llamar a la fotito de abajo
	  ?>
  </footer>
</body>
</html>