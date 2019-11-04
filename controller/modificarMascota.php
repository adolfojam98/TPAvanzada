<?php
require "../model/mascota.php";

$nuevoNombre = $_POST["mascota_nuevoNombre"];
$id_mascota = $_GET["idMascota"];

$mascota = new Mascota();
$mascota->actualizarMascota($nuevoNombre,$id_mascota);

?>