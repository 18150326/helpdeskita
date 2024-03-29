<?php 

  include "header.php"; 
  if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1 || $_SESSION['usuario']['rol'] == 2){

?>
<!-- loader -->
<div id="loaderPrincipal" class="loadingPrincipal">
  <div class="spinner-border text-info" style="width: 5rem; height: 5rem;" role="status"></div>
</div>

<!-- Contenido de la página -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Inicio</h1>
      <hr>
      <p class="h2">Bienvenido <strong><?php echo $_SESSION['usuario']['nombre']; ?>.</strong></p>
      <p>Tipo de usuario: <strong><?php if($_SESSION['usuario']['rol'] == 2)echo "Administrador";  if($_SESSION['usuario']['rol'] == 1)echo "Usuario Normal";?>.</strong></p>
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

<!-- Evento para desaparecer el loader -->
<script>
  const loadingSpinner = document.getElementById("loaderPrincipal");

  window.addEventListener("load", async function (e) {    
        
    loadingSpinner.classList.add('d-none');
  });

    
</script>