

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
    $listaMascotas = listar();
    foreach ($listaMascotas as $valor) {
    ?>  
    <tr>
    
    <td><?php echo $valor['nombre_mascota'];    ?> </td>
    <td><img src="<?php echo $valor['foto_mascota'];  ?>" alt=""> </td>
    
    <input type="button" value="Dar de baja" onclick="window.location = '../controller/bajarMascota.php?idMascota=<?php echo $valor['id_mascota'];?>'"/>
    
    <!-- location.('mostrarMascotas.php?id_usuario="" -->
    <!-- Arma el link para qeu pase los parametros por el metodo -->
   </tr>

<?php } ?>
    </table>
        <form action="../controller/agregarMascota.php" method="post" enctype ="multipart/form-data">
        <input type="text" name="nombre_mascota" id="nombre_mascota" placeholder="Ingrese nombre de su mascota">
        <input type="file" name="fotoMascota" id="fotoMascota">
        <input type="submit" value="enviar"></form>
</body>
</html>