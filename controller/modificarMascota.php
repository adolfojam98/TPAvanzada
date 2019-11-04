<?php
$nuevoNombre = $_POST["mascota_nuevoNombre"];
$id_mascota = $_GET["idMascota"];
require("../model/mascota.php");
$mascota = new Mascota();

$mascota->actualizarMascota($nuevoNombre,$id_mascota);


?>