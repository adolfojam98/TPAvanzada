<?php


function listarUsuarios(){

 require '../model/conexion.php';
 //crea objeto conexion   
    $conexion = new Conexion();
//se conecta a la bdd
$conexion->conectar();
//se arma la query
$query = 'SELECT id, nombre, apellido, usuario from usuario';

//se hace la query
$respuesta = $conexion->query($query);

return $respuesta;
}


?>