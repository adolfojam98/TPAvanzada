
<!-- TODO: ver si se puede hacer linda la tabla y que al apretar un boton te redirija a otra tabla manteniendo el id del usuario -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
    <tr> 
    <td>id</td>
    <td>nombre</td>
    <td>usuario</td>
    <td>apellido</td>
    </tr>
    <?php  
    
    require '../controller/listUser.php';
    $listaUsuarios = listarUsuarios();
    foreach ($listaUsuarios as $valor) {
    ?>  
    <tr>
    <td><?php echo $valor['id']   ?> </td>
    <td><?php echo $valor['nombre']   ?> </td>
    <td><?php echo $valor['apellido']   ?> </td>
    <td><?php echo $valor['usuario']   ?> </td>
    </tr>

<?php } ?>
    </table>


</body>
</html>