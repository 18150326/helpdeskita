
<?php

  session_start();

  if(!isset($_SESSION['usuario'])){
    header("location:../procesos/usuarios/login/salir.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/plantilla.css">
    <link rel="stylesheet" href="../public/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/datatable/buttons.dataTables.min.css">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/cb918a26fb.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Animaciones -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> -->

    <link rel="stylesheet" href="../public/css/styles-navbar.css">
    <link rel="stylesheet" href="../public/css/styles-loader.css">
    <title>Help-Desk</title>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Help - Desk</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="inicio.php">Inicio</a>
      </li>

      <!-- Vistas del usuario -->
    <?php if ($_SESSION['usuario']['rol'] == 1) {?>
      <li class="nav-item">
        <a class="nav-link" href="reportesP_Usuario.php">Servicios Pendientes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reportesT_Usuario.php">Servicios Terminados</a>
      </li>
    <?php } ?>

      <!-- Vistas del administrador -->
      <?php if ($_SESSION['usuario']['rol'] == 2) {?>
      <li class="nav-item">
        <a class="nav-link" href="usuariosAdmin.php">Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reportesP_Admin.php">Servicios Pendientes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reportesT_Admin.php">Servicios Terminados</a>
      </li>
      <?php } ?>
    </ul>
    <div class="my-2 my-lg-0">
     
      <a class="btn btn-outline-info" href="#"><?php echo $_SESSION['usuario']['nombre']; ?>  <i class="fas fa-user"></i></a>
      
      <a class="btn btn-outline-danger" href="../procesos/usuarios/login/salir.php">Cerrar sesión <i class="fas fa-sign-out-alt"></i></a>
    </div>
  </div>
</nav>
