<?php 

  include "header.php"; 
  if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1){

?>

<!-- Contenido de la página -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Mis reportes</h1>
      <p class="lead">
      
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalcrearReporte">
          Crear reporte
        </button>
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

<?php 

  }else
  {
    header("location:../index.html");
  }

?>