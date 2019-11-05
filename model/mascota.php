<?php
require_once('conexion.php');


  class Mascota extends Conexion
  {
 
   //Registro nueva mascota
    public function altaMascota($nombreM,$idDuenoM)
    {
      parent::conectar();
      //filtramos las variables para agrear a la bdd
      $nombre   = parent::filtrar($nombreM);
      $idDueno = parent::filtrar($idDuenoM);
   
          $rutaFoto = validarFoto($idDueno,$nombre);
         
            
            
              //insercion de los datos, aca se 
            parent::query('insert into mascota(nombre_mascota,foto_mascota) values ("'.$nombre.'","'.$rutaFoto.'")');
            $consulta = 'select id_mascota from mascota where nombre_mascota ="'.$nombre.'"';
           
            $mascota = parent::consultaArreglo($consulta);
            
            parent::query('insert into usuario_mascota(id_usuario,id_mascota) values ("'.$idDueno.'","'.$mascota["id_mascota"].'")');
            //Se podrai hacer una validacion aca pero alta paja
 
            header("Location:../view/misMascotas.php");
        
        //REGISTRADO SATISFACTORiAMENTE


        

      

      parent::cerrar();
    }

   public function misMascotas($id){

    parent::conectar();
    $consulta = 'select mascota.id_mascota,nombre_mascota,foto_mascota from usuario_mascota inner join mascota on mascota.id_mascota = usuario_mascota.id_mascota where id_usuario ='.$id;
    $resultado = parent::query($consulta);
    parent::cerrar();
    return $resultado;



}

public function bajaMascota($id){

    parent::conectar();
    $consulta1 = 'delete from usuario_mascota where id_mascota ='.$id;
    $consulta2 = 'delete from mascota where id_mascota='.$id;

    parent::query($consulta1);
    parent::query($consulta2);

    parent::cerrar();

    header("Location:../view/misMascotas.php");
  


}

  public function actualizarMascota($n, $id){
    session_start();
    parent::conectar();
    $nombre_mascota = parent::filtrar($n);
    $id_mascota = parent::filtrar($id);
  
    if(!empty($nombre_mascota)){
      $consulta = 'UPDATE mascota SET nombre_mascota = "'.$nombre_mascota.'" WHERE id_mascota='.$id_mascota;
      
    
      parent::query($consulta); 
    
   
    }else{
      $consulta = 'SELECT nombre_mascota FROM mascota where id_mascota = '.$id_mascota;
      $resultado = parent::consultaArreglo($consulta);
      //Por si no se cambia el nombre de la mascota
      $nombre_mascota = $resultado['nombre_mascota'];
    
      
    }
 
      
    if(!($_FILES['actualizarFoto_mascota']['name'] == null)){
    
     
      $archivos_disp_ar = array('jpg', 'jpeg', 'gif', 'png', 'tif', 'tiff', 'bmp');

       //saca el nombre de la foto
       $nombreFotoPerfil = $_FILES["actualizarFoto_mascota"]["name"];
      
       //saca la extension
       $nombreFotoPerfil = explode('.',$nombreFotoPerfil);
       $cuenta_arr_nombre = count($nombreFotoPerfil);
       $extension = strtolower($nombreFotoPerfil[--$cuenta_arr_nombre]);
      
       
       //Validamos la extension
      if(!(in_array($extension, $archivos_disp_ar))){
        require("../view/registroFail.php");
        archivoInvalido();
        die();
      }else{
        //////Borro la antigua foto/////////
        //consulto la ruta de la foto
        $consulta = 'SELECT foto_mascota FROM mascota WHERE id_mascota = '.$id_mascota;
        $respuesta = parent::consultaArreglo($consulta);
        $ruta = $respuesta["foto_mascota"];
        //Borra la foto
        unlink($ruta);
     
        //saca donde esta almacenado temporalmente
        $archivo = $_FILES['actualizarFoto_mascota']['tmp_name'];
        //Generamos la ruta en donde se almacena
        $rutaFoto = '../view/imagenes/fotoMascotas';
        $rutaFoto = $rutaFoto .'/'. $_SESSION["id"] . '_'.$nombre_mascota.'.'.$extension;
        $consulta = 'UPDATE mascota SET foto_mascota = "'.$rutaFoto.'" WHERE id_mascota = '. $id_mascota;
        parent::query($consulta);
        move_uploaded_file($archivo,$rutaFoto); 
        
    
        
      }
    }else{
      //Esto es para que cuando se cambie el nombre de la mascota se cambie la ruta de la foto
      //consultamos la ruta antigua
      $consulta = 'SELECT foto_mascota FROM mascota WHERE id_mascota = '.$id_mascota;
      $resultado = parent::consultaArreglo($consulta);
      $rutaFotoOld = $resultado["foto_mascota"];
      
       //Sacamos la extension
       $rutaTlantica = explode('.',$rutaFotoOld);
       $cuenta_arr_nombre = count($rutaTlantica);
       $extension = strtolower($rutaTlantica[--$cuenta_arr_nombre]);
      //armamos la ruta nueva
       $rutaFotoNew = '../view/imagenes/fotoMascotas/'.$_SESSION["id"].'_'.$nombre_mascota.'.'.$extension;
       //renombramos la ruta
       rename($rutaFotoOld,$rutaFotoNew);
       //almacenamos la nueva ruta en la base de datos
       $consulta = 'UPDATE mascota SET foto_mascota = "'.$rutaFotoNew .'" WHERE id_mascota ='.$id_mascota;
        parent::query($consulta);
    }
    parent::cerrar();
    header("Location:../view/misMascotas.php");
  }
}

  function validarFoto($idDueno,$nombre){
    //areglo de extensiones validas
    $archivos_disp_ar = array('jpg', 'jpeg', 'gif', 'png', 'tif', 'tiff', 'bmp');
     //Valida si hubo una insercion de foto     
    if(isset($_FILES["fotoMascota"])){
          //saca el nombre de la foto
          $nombreFotoPerfil = $_FILES["fotoMascota"]["name"];
         
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
          $archivo = $_FILES['fotoMascota']['tmp_name'];
          //Generamos la ruta en donde se almacena
          $rutaFoto = '../view/imagenes/fotoMascotas';
      
          $rutaFoto = $rutaFoto .'/'. $idDueno . '_'.$nombre .'.'. $extension;
          move_uploaded_file($archivo,$rutaFoto); 
          }else{
            //Asigna el valor por defecto de foto del usuario
            $rutaFoto = '../view/imagenes/mascota-default.png';
            
          }

          return $rutaFoto;
  }


?>
