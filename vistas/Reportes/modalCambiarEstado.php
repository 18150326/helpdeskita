<form id="frmCambiarEstado" method="POST" onsubmit="return CambiarEstado(<?php echo $mostrar['idReporte']; ?>)">

<!-- Modal Firmar -->
<div class="modal fade" id="modalCambiarEstado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Aviso de confirmación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="text" id="idReporteCE" name="idReporteCE" hidden>
      <div class="modal-body">
        <!-- Formulario en modal -->
        <div class="row">
            <div class="col-sm-12">
                <label for="men"> Al hacer click en aceptar, se da por hecho que el problema está siendo solucionado por el personal 
                    y se le avisará al personal solicitante, ¿esta seguro/a de esto?
                </label>
            </div>
        </div>
      </div>

      <div class="modal-footer">
        <span class="btn btn-secondary" data-dismiss="modal">Cerrar</span>
        <a class="btn btn-primary" href="#" id="button-cambiar">Aceptar</a>
      </div>
    </div>
  </div>
</div>

</form>

<script>
document.getElementById("button-cambiar").addEventListener("click",async function(){
  const form = document.getElementById("frmCambiarEstado");
  const dataform = new FormData(form);
  const res = await fetch("../procesos/reportes/crud/cambiarEstado.php", {
    method: "POST", body: dataform
  });
  const data = await res.json();
  if(data == 1){
    Swal.fire("Operación realizada","¡El reporte ahora esta en proceso! ","success");
    $('#cargartablareportes').load("Reportes/tablareportesP_Admin.php");
    $('#frmCambiarEstado').modal('hide');
  }else{
    Swal.fire("Operación no realizada","Error al realizar cambio", "error");
  }

});

</script>