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
     
      //retorna el numero de filas afectadas
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
        $_SESSION['user']     = $user['usuario'];
        $_SESSION['validate'] = true;

       
       

         }else{
        
        
				$_SESSION["validate"] = false;
			  $_SESSION["error"] = "incorrecto";
			  header("Location:../view/inicioFail.php");
          die();
      }


      # Cerramos la conexion
      parent::cerrar();
      header("Location:../view/inicio.php");
      die();
    }

 
 
   //Registro usuario nuevo 
    public function registroUsuario($name,$last_name,$userr,$pass)
    {
      parent::conectar();
      //filtramos las variables para agrear a la bdd
      $nombre   = parent::filtrar($name);
      $apellido = parent::filtrar($last_name);
      $email    = parent::filtrar($userr);
      $clave    = parent::filtrar($pass);
      
      
      // validar que el correo no exita
      $consulta = "select id from usuario where usuario= '".$email."'";
      
      $verificarCorreo = parent::verificarRegistros($consulta);


      if($verificarCorreo > 0){
      // TODO: "indicar que el correo que quiere registrar ya existe";
        
      }else{
            // $a=0;
            // if($a==0){
            //   $b ='insert into usuario(nombre,apellido,usuario,contrasenia) values("'.$nombre.'","'.$apellido.'","'.$email.'", MD5("'.$clave.'")';
            //   echo $b;
            // }
           
            //Valida la foto(si es que se inserto alguna) y la lleva al directorio, devuelve la ruta en donde se aloja
            $rutaFoto = validarFoto($email);
         
            
            
              //insercion de los datos, aca se 
            parent::query('insert into usuario(nombre,apellido,usuario,contrasenia, fotoPerfil) values ("'.$nombre.'","'.$apellido.'","'.$email.'", MD5("'.$clave.'"),"'.$rutaFoto.'")');
            //Se podrai hacer una validacion aca pero alta paja
 
            $this->login($email,$clave);
        
        //REGISTRADO SATISFACTORiAMENTE


        

      }

      parent::cerrar();
    }

   

  }

  function validarFoto($email){
    //areglo de extensiones validas
    $archivos_disp_ar = array('jpg', 'jpeg', 'gif', 'png', 'tif', 'tiff', 'bmp');
     //Valida si hubo una insercion de foto     
     if(isset($_FILES['fotoPerfil'])){
          //saca el nombre de la foto
          $nombreFotoPerfil = $_FILES["fotoPerfil"]["name"];
         
          //saca la extension
          $nombreFotoPerfil = explode('.',$nombreFotoPerfil);
          $cuenta_arr_nombre = count($nombreFotoPerfil);
          $extension = strtolower($nombreFotoPerfil[--$cuenta_arr_nombre]);
         
          
          //Validamos la extension
          if(!in_array($extension, $archivos_disp_ar)){
          }else{
           //TODO: "El archivo subido no es valido";
           }

           //saca donde esta almacenado temporalmente
          $archivo = $_FILES['fotoPerfil']['tmp_name'];
          //Generamos la ruta en donde se almacena
          $rutaFoto = '../view/imagenes/fotoPerfiles';
      
          $rutaFoto = $rutaFoto .'/'. $email . '_foto.' . $extension;
          move_uploaded_file($archivo,$rutaFoto); 
          }else{
            //Asigna el valor por defecto de foto del usuario
            $rutaFoto = '../view/imagenes/user-default.png';
            
          }

          return $rutaFoto;
  }


?>
