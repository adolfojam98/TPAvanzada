<?php
	session_start();

    $email = $_POST["email"];
    $password = $_POST["password"];
    $secret= "6LcktLwUAAAAADGRlpvlnAyubRY6EtLAzIuOJZl0";
    $_SESSION["validate"] = false;	  
	
	$recaptcha = $_POST["g-recaptcha-response"];
 //Proceso de validacion del captcha
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


	$_SESSION["error"] = "";

	if ($captcha_success->success) {
		if(ctype_alnum($email)  && ctype_alnum($password)){
			require_once('../model/usuario.php');
			$user = new Usuario();
			$user -> login($email, $password);

		

    		// if ($email == "fcytuader" && $password == "programacionavanzada"){
    		// 	$_SESSION["user"] = $email;
    		// 	$_SESSION["pass"] = $password;
    		// 	$_SESSION["validate"] = true;
    		// 	header("Location:../view/inicio.php");
    		// }
    		// else{
			// 	$_SESSION["validate"] = false;
			// 	$_SESSION["error"] = "incorrecto";
			// 	header("Location:../view/inicioFail.php");
    		// }
		
		}else{
			$_SESSION["validate"] = false;
			$_SESSION["error"] = "malEntrada";
			header("Location:../view/inicioFail.php");
        }
	} else {

		$_SESSION["captcha"] = false;
		$_SESSION["error"] = "malCaptcha";
		header("Location:../view/inicioFail.php");
	}
?>