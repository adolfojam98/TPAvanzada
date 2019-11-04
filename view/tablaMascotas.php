

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
    <title>Mascotas</title>
</head>
<body>
    <?php  
    $nom = $_GET["nombre"];
    ?>
<div class="navbar-fixed">
<nav class="light-green darken-3">
    <div class="nav-wrapper container">
        <a href="tablaMascotas.php" class="brand-logo">Mascotas de <?php echo $nom; ?></a>
        <ul class="right">
            <li><a href="tablaUsuarios.php">Ver usuarios</a></li>
            <li><a href="misMascotas.php">Ver mis mascotas</a></li>
            <li><a href="ActualizarPerfil.php">Editar perfil</a></li>
            <li><a href="../controller/cerrarSesion.php">Cerrar sesión</a></li>
        </ul>
    </div>
</nav>
<div id="div-boton">
<a class="btn-floating btn-large lime" href="tablaUsuarios.php" title="Volver"><i class="material-icons">navigate_before</i></a>
</div>
</div>
<div id="div-contenido">
    <div class="row">
        <?php  
            $idd = $_GET["id"];
            require '../controller/listMascotas.php';
            $listaMascotas = listaMascotasUsuario($idd);
            foreach ($listaMascotas as $valor) {
        ?>
        <div class="col s6">
        <div class="card">
        <div class="card-image">
            <img class="responsive-img" src="<?php echo $valor['foto_mascota'];?>" alt="">
        </div>
        <div class="card-content">
          <h4><?php echo $valor['nombre_mascota'] ?></h4>
        </div>
        </div>    
    </div>
    <?php } ?>
</div>

</body>
</html>

