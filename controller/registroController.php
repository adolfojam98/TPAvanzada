<?php

  $name          = $_POST["nombre"];
  $apellido      = $_POST["apellido"];
  $usuario       = $_POST["usuario"];
  $contrasenia1  = $_POST["contrasenia1"];
  $contrasenia2  = $_POST["contrasenia2"];
 // $fotoPerfil = $_POST["imgPerfil"];
//creo que esto tiene que ir ahí para que tome la imagen, si no nunca la recibe, 
//igual lo comento porque no es mi área 
   
    

  //si alguno de los campos esta vacio
  if(empty($usuario) || empty($contrasenia1) || empty($contrasenia2))
  {

    //TODO: indicar que algun/os de los campos estn vacios
    

  }else{

    if($contrasenia1 === $contrasenia2){

         # Incluimos la clase usuario
        require_once('../model/usuario.php');

        # Creamos un objeto de la clase usuario
        $user = new Usuario();

        # Llamamos al metodo login para validar los datos en la base de datos
        $user -> registroUsuario($name, $apellido,$usuario,$contrasenia1);

        header("../view/incio.php");
     

    }else{
     // TODO: "indicar que las contraseñas ingresadas no coinciden";
    }

  }




// ?>


