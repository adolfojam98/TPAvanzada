

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
  });
    </script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  <!-- Iconos -->
</head>
<body>
<div class="navbar-fixed">
<nav>
    <div class="nav-wrapper container">
        <a href="misMascotas.php" class="brand-logo">Mis mascotas</a>
        <ul class="right">
            <li><a href="tablaUsuarios.php">Ver usuarios</a></li>
            <li><a href="misMascotas.php">Ver mis mascotas</a></li>
            <li><a href="#">Editar perfil</a></li>
            <li><a href="../controller/cerrarSesion.php">Cerrar sesión</a></li>
        </ul>
    </div>
</nav>
</div>
<div id="div-boton">
<a class="btn-floating btn-large modal-trigger" href="#idModal" title="Agregar una nueva mascota"><i class="material-icons">add</i></a>
</div>
<div id="div-boton2">
<a class="btn-floating btn-large" href="inicio.php" title="Volver"><i class="material-icons">navigate_before</i></a>
</div>
<div id="div-contenido">
    <div class="row">
        <?php  
            require '../controller/listMascotas.php';
            $listaMascotas = listar();
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
        <div class="card-action">
            <a class="btn-floating" title="Modificar" href="../controller/modificarMascota.php?idMascota=<?php echo $valor['id_mascota'];?>"><i class="material-icons">edit</i></a>
            <a class="btn-floating" title="Eliminar" href="../controller/bajarMascota.php?idMascota=<?php echo $valor['id_mascota'];?>"><i class="material-icons">delete</i></a>
            <!-- location.('mostrarMascotas.php?id_usuario="" -->
            <!-- Arma el link para qeu pase los parametros por el metodo -->
        </div>
        </div>    
    </div>
    <?php } ?>

    <div id="idModal" class="modal">
        <div class="modal-content">
            <form action="../controller/agregarMascota.php" method="post" enctype ="multipart/form-data">
                <input type="text" name="nombre_mascota" id="nombre_mascota" placeholder="Ingrese nombre de su mascota">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Archivo</span>
                        <input type="file" name="fotoMascota" id="fotoMascota">
                    </div>
                    <div class="file-path-wrapper">
                        <input placeholder="Imagen de perfil" class="file-path validate" type="text">
                    </div>
                </div>
                <div align="center">
                    <button class="btn waves-effect waves-light" type="submit" value="enviar" name="action">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>