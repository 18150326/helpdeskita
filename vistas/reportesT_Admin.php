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
      <h1 class="fw-light">Servicios Terminados</h1>
      <p class="lead">
      
        <hr>
        <div class="row">
            
            <div class="col-sm-3">
                <label for="fechaElaboracion"> Desde </label>
                <input type="date" class="form-control" id="fecha-desde" name="fechaElaboracion" required>
            </div>
            <div class="col-sm-3">
                <label for="fechaElaboracion"> Hasta </label>
                <input type="date" class="form-control" id="fecha-hasta" name="fechaElaboracion" required>
            </div>
        </div>
        
        <button type="button" class="btn btn-primary" id="button-buscar" style="margin-top: 15px">Buscar</button>
        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Limpiar" style="margin-top: 15px" id="button-limpiar">
          <i class="fas fa-eraser"></i>
        </button>
        <hr>
        <div id="cargartablareportes">
          
        </div>
      </p>
    </div>
  </div>
</div>

<?php 
    include "Reportes/modalRecogerReporte.php";
    include "Reportes/modalTerminarReporte.php"; 
    include "footer.php";
  }else
  {
    header("location:../index.html");
  }

?>

<script src="../public/js-usuarios/reportesT_Admin.js"></script>

<!-- Evento para desaparecer el loader -->
<script>
  const loadingSpinner = document.getElementById("loaderPrincipal");

  window.addEventListener("load", async function (e) {
    setTimeout(function(){
      loadingSpinner.classList.add('d-none');
    }, 1000);

  });

  document.getElementById("button-buscar").addEventListener("click", function (e) {
    var desde = document.getElementById("fecha-desde").value;
    var hasta = document.getElementById("fecha-hasta").value;
    // alert(desde+"________"+hasta);
    if(!desde  || !hasta ){
        Swal.fire("Operación no realizada","Ambos campos de fecha deben ser llenados", "error");
        // console.log("Un input está vacio");
    }else{
        $('#cargartablareportes').load("Reportes/tablareportesT_Admin.php?desde="+desde+"&hasta="+hasta);         
    }
    
  });

  document.getElementById("button-limpiar").addEventListener("click", function (e) {
    document.getElementById("fecha-desde").value = "";
    document.getElementById("fecha-hasta").value = "";
    var desde = "";
    var hasta = "";
    // alert(desde+"________"+hasta);
    $('#cargartablareportes').load("Reportes/tablareportesT_Admin.php?desde="+desde+"&hasta="+hasta);
    
  });

</script>