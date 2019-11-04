<?php
session_start();
if(isset($_SESSION["id"])){
	header("Location:inicio.php");
}
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
			function alerta(opcion, titulo, texto){
				swal({
  					title: titulo,
  					text: texto,
  					type: opcion,
  					icon: opcion,
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

function errorContrasenias(){
	echo "<script> alerta('error', 'Error', 'Las contraseñas no coinciden');</script>";
}

/*function cambiosExitosos(){
	echo "<script> alerta('success', 'Excelente', 'Los cambios se han realizado con éxito');</script>";
}*/

function archivoInvalido(){
	echo "<script> alerta('error', 'Error', 'El archivo ingresado no es válido');</script>";
}

function errorUsuario(){
	echo "<script> alerta('error', 'Error', 'El usuario ya se encuentra registrado');</script>";
}
