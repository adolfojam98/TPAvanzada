<?php
require "../model/usuario.php";

$nombre = $_POST["nombre_cambio"];
$apellido = $_POST["apellido_cambio"];

$user = new Usuario();
$user->actualizarUsuario($nombre,$apellido);
//TODO:podemos hacer cambios hechos satisfactoriamente

?>