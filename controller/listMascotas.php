<?php

require '../model/mascota.php';


function listar(){
$mascota = new Mascota();
$id = $_SESSION["id"];

$lista = $mascota->misMascotas($id);

return $lista;

}

function listaMascotasUsuario($id_user){
    $mascota = new Mascota();
    $lista = $mascota->misMascotas($id_user);
    return $lista;

}
?>

