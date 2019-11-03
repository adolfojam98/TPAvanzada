
<?php
session_start();
if(!isset($_SESSION["id"])){
    header("Location:login.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  <!-- Iconos -->
    <title>Usuarios</title>
</head>
<body>
<div class="navbar-fixed">
<nav>
    <div class="nav-wrapper container">
        <a href="tablaUsuarios.php" class="brand-logo">Usuarios</a>
        <ul class="right">
            <li><a href="tablaUsuarios.php">Ver usuarios</a></li>
            <li><a href="misMascotas.php">Ver mis mascotas</a></li>
            <li><a href="#">Editar perfil</a></li>
            <li><a href="../controller/cerrarSesion.php">Cerrar sesión</a></li>
        </ul>
    </div>
</nav>
<div id="div-boton2">
<a class="btn-floating btn-large" href="inicio.php" title="Volver"><i class="material-icons">navigate_before</i></a>
</div>
</div>
<div id="div-contenido">

<table class="centered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            
            <?php   
                require '../controller/listUser.php';
                $listaUsuarios = listarUsuarios();
                foreach ($listaUsuarios as $valor) {
            ?> 
            <tr>
                <td><?php echo $valor['nombre']    ?> </td>
                <td><?php echo $valor['apellido']  ?> </td>
                <td><?php echo $valor['usuario']   ?> </td>
                <!-- location.('mostrarMascotas.php?id_usuario="" -->
                <!-- Arma el link para qeu pase los parametros por el metodo -->
                <?php $id = $valor["id"];
                      $nombre = $valor["nombre"];
                ?>
                <td><button class="btn waves-effect waves-light" type="button" value="Inicio" onclick="window.location = 'tablaMascotas.php?id=<?php echo $id?>&nombre=<?php echo $nombre;?>'">Ver</button></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    </body>
</html>