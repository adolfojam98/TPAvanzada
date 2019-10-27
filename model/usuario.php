<?php

  # Incluimos la clase conexion para poder heredar los metodos de ella.
  require_once('conexion.php');


  class Usuario extends Conexion
  {

    public function login($user, $clave)
    {
    //Conecta con la base de datos
      parent::conectar();


      // El metodo salvar sirve para escapar cualquier comillas doble o simple 
      //y otros caracteres que pueden vulnerar nuestra consulta SQL
      $user  = parent::salvar($user);
      $clave = parent::salvar($clave);

      


      // traemos el id y el nombre de la tabla usuarios donde el usuario sea igual al usuario ingresado y ademas la clave sea igual a la ingresada para ese usuario.
      $consulta = 'select id, nombre, apellido, usuario  from usuario where usuario="'.$user.'" and contrasenia= MD5("'.$clave.'")';
      /*
        Verificamos si el usuario existe, la funcion verificarRegistros
        retorna el número de filas afectadas, en otras palabras si el
        usuario existe retornara 1 de lo contrario retornara 0
      */

      $verificar_usuario = parent::verificarRegistros($consulta);

      // si la consulta es mayor a 0 el usuario existe
      if($verificar_usuario > 0){
      
      //Hacemos una consulta que te devuelve un arreglo de datos con la primer fila encontrada

        $user = parent::consultaArreglo($consulta);

        

          //Iniciamos session
        session_start();

       
        //Ponemos las variables dentro de la session
        $_SESSION['id']       = $user['id'];
        $_SESSION['nombre']   = $user['nombre'];
        $_SESSION["apellido"] = $user['apellido'];
        $_SESSION['user']  = $user['usuario'];
        $_SESSION['validate'] = true;

       
       

         }else{
        // El usuario y la clave son incorrectos
        
				$_SESSION["validate"] = false;
			  $_SESSION["error"] = "incorrecto";
			  header("Location:../view/inicioFail.php");
          die();
      }


      # Cerramos la conexion
      parent::cerrar();
      header("Location:../view/inicio.php");
    }

 
 
   //Registro usuario nuevo 
    public function registroUsuario($nombre,$apellido,$usuario,$contrasenia)
    {
      parent::conectar();

      // $nombre   = parent::filtrar($nombre);
      // $apellido = parent::filtrar($apellido);
      // $email    = parent::filtrar($usuario);
      // $clave    = parent::filtrar($contrasenia);

      $email = $usuario;
      $clave = $contrasenia;
      // validar que el correo no exita
      $consulta = "select id from usuario where usuario= '".$email."'";
      
      $verificarCorreo = parent::verificarRegistros($consulta);


      if($verificarCorreo > 0){
       //ACA HACE QUE TE SALGA ALGO QUE DIGA QUE EL CORRERO YA EXISTE<-----------------------------
        
      }else{

        $variable =parent::query('insert into usuario(nombre, apellido, usuario, contrasenia) values("'.$nombre.'","'.$apellido.'","'.$usuario.'", MD5("'.$clave.'")');
         
        
        //REGISTRADO SATISFACTORiAMENTE


        

      }

      parent::cerrar();
    }

  }


?>
