<?php
require '../model/mascota.php';
session_start();
$id = $_SESSION["id"];
$nombre = $_POST["nombre_mascota"];

$mascota = new Mascota();
$mascota->altaMascota($nombre,$id);



?>