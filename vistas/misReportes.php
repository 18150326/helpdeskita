<?php 

  include "header.php"; 
  include "../clases/Reportes.php";
  $con = new conexion();
  $conexion1 = $con->conectar();
  $idUsuario = $_SESSION['usuario']['id'];

  if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1){

?>

<!-- Contenido de la página -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Mis reportes</h1>
      <p class="lead">

        <hr>
        <div id="cargartablareportes">
          
        </div>
      </p>

    </div>
  </div>
</div>


<?php 
  include "Reportes/modalCrearReporte.php";
  include "footer.php"; 
?>

<script src="../public/js-usuarios/reportes.js"></script>




<?php 

  }else
  {
    header("location:../index.html");
  }

?>