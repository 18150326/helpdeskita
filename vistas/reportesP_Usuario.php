<?php
  
  include "header.php";
  include "../clases/Reportes.php";
  
  $con = new conexion();
  $conexion1 = $con->conectar();
  $idUsuario = $_SESSION['usuario']['id'];

  if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1){

?>

<!-- loader -->
<div id="loaderPrincipal" class="loadingPrincipal">
  <div class="spinner-border text-info" style="width: 5rem; height: 5rem;" role="status"></div>
</div>

<!-- Contenido de la página -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Mis Serivicios Pendientes</h1>
      <p class="lead">

        <hr>
        <div id="cargartablareportes">

        </div>
      </p>

    </div>
  </div>
</div>


<?php
  include "Reportes/modalFirmarReporte.php";
  include "Reportes/modalCrearReporte.php";
  include "footer.php";
?>

<script src="../public/js-usuarios/reportesP_Usuario.js"></script>

<!-- Evento para desaparecer el loader -->
<script>
  const loadingSpinner = document.getElementById("loaderPrincipal");

  window.addEventListener("load", async function (e) {
    setTimeout(function(){
      loadingSpinner.classList.add('d-none');
    }, 1000);

  });

</script>



<?php

  }else
  {
    header("location:../index.html");
  }

?>
