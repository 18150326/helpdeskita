<?php 

  include "header.php"; 
  if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2){

?>

<!-- Contenido de la página -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Administración de Usuarios</h1>
      <p class="lead">
      
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuarios">
          Agregar usuarios
        </button>
        <hr>
        <div id="cargartablausuarios">
          
        </div>
      </p>
    </div>
  </div>
</div>

<?php 
  include "Usuarios/modalAgregar.php";
  include "Usuarios/modalEditar.php";
  include "footer.php"; 
?>

<script src="../public/js-usuarios/usuarios.js"></script>

<?php
  }else
    {
    header("location:../index.html");
    }
?>