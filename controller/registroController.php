<?php

  $name          = $_POST["nombre"];
  $apellido      = $_POST["apellido"];
  $usuario       = $_POST["usuario"];
  $contrasenia1  = $_POST["contrasenia1"];
  $contrasenia2  = $_POST["contrasenia2"];

  if(empty($usuario) || empty($contrasenia1) || empty($contrasenia2))
  {

    echo 'error_1'; // AGREGAR ALERTA O ALGO QUE LE DIGA AL USUARIO QUE INGRESE TODOS LOS CAMPOS

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
      //AGREGAR ALGO QUE INDIQUE QUE LAS CONTRASEÑAS NO COINCIDEN
    }

  }




?>
