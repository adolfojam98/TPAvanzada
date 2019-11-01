<?php
require '../model/mascota.php';
$idMascota = $_GET["idMascota"];
$mascota = new Mascota();
$mascota->bajaMascota($idMascota);



?>