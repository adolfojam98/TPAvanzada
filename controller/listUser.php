<?php

function listarUsuarios(){
 require '../model/conexion.php';   
    $conexion = new Conexion();

$conexion->conectar();
$query = 'SELECT id, nombre, apellido, usuario from usuario';


$respuesta = $conexion->query($query);

return $respuesta;
}


?>