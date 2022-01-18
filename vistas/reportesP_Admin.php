<?php 

  include "header.php"; 
  if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2){

?>

<!-- Contenido de la página -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Reportes Pendientes</h1>
      <p class="lead">
      
        <!--<button class="btn btn-primary" data-toggle="modal" data-target="#modalterminarReporte">
          Terminar reporte
        </button> -->
        <hr>
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalterminarReporte"
                    onclick="obtenerDatosReporte(<?php echo $mostrar1[0]['idReporte']?>)">
            Terminar reporte
        </button>

        <div id="cargartablareportes">
          
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

<script src="../public/js-usuarios/reportesP_Admin.js"></script>


<script>
  $(document).ready(function(){
      $('#tablaReportesAdminDatatable').Datatable({
          language : {
              url . "../public/datatable/es_es.json"
          },
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
      });
  })
</script>