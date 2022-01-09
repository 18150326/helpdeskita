
<?php

  session_start();

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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Help-Desk</title>
</head>
<body>
    
    <!-- Navegación -->
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
  <div class="container">
    <a class="navbar-brand" href="inicio.php">Help - Desk</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
          <a class="nav-link" href="inicio.php">Inicio</a>
        </li>

        <!-- Vistas del usuario -->
      <?php if ($_SESSION['usuario']['rol'] == 1) {?>
        <li class="nav-item">
          <a class="nav-link" href="misReportes.php">Reportes de Soporte</a>
        </li>
      <?php } ?>

        <!-- Vistas del administrador -->
        <?php if ($_SESSION['usuario']['rol'] == 2) {?>
        <li class="nav-item">
          <a class="nav-link" href="usuariosAdmin.php">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reportesAdmin.php">Reportes</a>
        </li>
        <?php } ?>

        <!-- Usuario/cerrar sesión -->
        <li class="nav-item dropdown">
          <a style="color:blue" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Usuario <?php echo $_SESSION['usuario']['nombre']; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../procesos/usuarios/login/salir.php">Cerrar sesión</a>
          </div>
        </li>

      </ul>
    </div>
  </div>
</nav>