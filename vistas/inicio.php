<?php 

  include "header.php"; 
  if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1 || $_SESSION['usuario']['rol'] == 2){

?>

<!-- Contenido de la página -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Inicio</h1>
      <p class="lead">Content on the page will</p>
    </div>
  </div>
</div>

<?php 
  
  include "footer.php"; 
  }else
  {
    header("location:../index.html");
  }

?>