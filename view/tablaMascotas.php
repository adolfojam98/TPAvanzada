
<!-- TODO:hACER LINDA LA TABLA -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php  

    require '../controller/listMascotas.php';
    $idd = $_GET["id"];
    $listaMascotas = listaMascotasUsuario($idd);
    foreach ($listaMascotas as $valor) {
    ?>  
    <tr>
    
    <td><?php echo $valor['nombre_mascota']    ?> </td>
    <td><img src="<?php echo $valor['foto_mascota'];?>" alt=""></td>


<?php } ?>
    </table>
        <a href="inicio.php">Volver</a>
</body>
</html>

