<?php
session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
    

</head>
<body>

<script type="text/javascript"> 
			function alerta(texto){
				swal({
  					title: "Error",
  					text: texto,
  					type: "error",
  					icon: "error",
  					confirmButtonText: "Aceptar",
  					allowOutsideClick: true
				}).then(function(){
					history.back();
					//window.location.href = "index.php"
				});
			}
 		</script>

</body>
</html>

<?php
if($_SESSION["error"] == "incorrecto"){
	echo "<script> alerta('Usuario y/o contraseña incorrectos');</script>";
}
elseif($_SESSION["error"] == "malEntrada"){
    echo "<script> alerta('Los datos solo pueden contener letras y/o números');</script>";
}elseif($_SESSION["error"] == "malCaptcha"){
    echo "<script>alerta('Debe validar el captcha');</script>";
}



?>