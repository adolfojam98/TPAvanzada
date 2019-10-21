<?php
	session_start();

    $email = $_POST["email"];
    $password = $_POST["password"];
    $secret= "6LcktLwUAAAAADGRlpvlnAyubRY6EtLAzIuOJZl0";
    $_SESSION["validate"] = false;	  
	
	$recaptcha = $_POST["g-recaptcha-response"];
 
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array(
		'secret' =>$secret ,
		'response' => $recaptcha
	);
	$options = array(
		'http' => array (
			'method' => 'POST',
			'content' => http_build_query($data),
			'header' => 'Content-Type: application/x-www-form-urlencoded'
		)
	);
	$context  = stream_context_create($options);
	$verify = file_get_contents($url, false, $context);
	$captcha_success = json_decode($verify);

	?>

<!DOCTYPE html>
<html>
	<head>
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
	if ($captcha_success->success) {
		if(ctype_alnum($email)  && ctype_alnum($password)){
    		if ($email == "fcytuader" && $password == "programacionavanzada"){
    			$_SESSION["user"] = $email;
    			$_SESSION["pass"] = $password;
    			$_SESSION["validate"] = true;
    			header("Location:inicio.php");
    		}
    		else{
    			echo "<script> alerta('Usuario y/o contraseña incorrectos');</script>";
    		}
    	}else{
        	echo "<script> alerta('Los datos solo pueden contener letras y/o números');</script>";
        }
	} else {
		echo "<script>alerta('Debe validar el captcha');</script>";
	}
?>