<?php 

  include "header.php"; 
  if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2){

?>
<!-- loader -->
<div id="loaderPrincipal" class="loadingPrincipal">
  <div class="spinner-border text-info" style="width: 5rem; height: 5rem;" role="status"></div>
</div>

<!-- Contenido de la página -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Perfil</h1>
      <p class="lead">
        <hr>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Nombre</span>
          </div>
          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Apellidos</span>
          </div>
          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3 normal-width" >
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Contraseña</span>
          </div>
          <input type="text" class="form-control">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button"><i class="fas fa-eye"></i></button>
          </div>          
        </div>     
        
      </p>
    </div>
  </div>
</div>

<?php 
    include "Reportes/modalTerminarReporte.php"; 
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
    setTimeout(function(){
      loadingSpinner.classList.add('d-none');
    }, 1000);

  });

</script>