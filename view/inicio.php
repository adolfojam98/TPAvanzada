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
    <title>Incio</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  <!-- Iconos -->
</head>

<body>
<div class="navbar-fixed">
<nav class="light-green darken-3">
    <div class="nav-wrapper container">
        <a href="inicio.php" class="brand-logo">Bienvenido/a <?php echo $_SESSION["nombre"]; ?></a>
        <ul class="right">
            <li><a href="tablaUsuarios.php">Ver usuarios</a></li>
            <li><a href="misMascotas.php">Ver mis mascotas</a></li>
            <li><a href="ActualizarPerfil.php">Editar perfil</a></li>
            <li><a href="../controller/cerrarSesion.php">Cerrar sesión</a></li>
        </ul>
    </div>
</nav>
</div>
    <div class="container">
        <div id="img-usuario">
            <img src="<?php echo $_SESSION["fotoPerfil"]; ?>" class="circle responsive-img" alt="">
        </div>

    </div>
</body>
</html>