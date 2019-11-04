<?php

  $name          = $_POST["nombre"];
  $apellido      = $_POST["apellido"];
  $usuario       = $_POST["usuario"];
  $contrasenia1  = $_POST["contrasenia1"];
  $contrasenia2  = $_POST["contrasenia2"];
 // $fotoPerfil = $_POST["imgPerfil"];
//creo que esto tiene que ir ahí para que tome la imagen, si no nunca la recibe, 
//igual lo comento porque no es mi área 
   
    

//nunca van a estar vacios porque le puse required, o sea no lo deja mandar hasta que esten todos los campos completos
  //si alguno de los campos esta vacio
  /*if(empty($usuario) || empty($contrasenia1) || empty($contrasenia2))
  { 

  }else{*/
    
    if($contrasenia1 === $contrasenia2){

         # Incluimos la clase usuario
        require_once('../model/usuario.php');
        $_SESSION["error"] = "";
        # Creamos un objeto de la clase usuario
        $user = new Usuario();

        # Llamamos al metodo login para validar los datos en la base de datos
        $user -> registroUsuario($name, $apellido,$usuario,$contrasenia1);
        header("../view/incio.php");

    }else{
      require_once("../view/registroFail.php");
      errorContrasenias();
    }

  //}




 ?>


