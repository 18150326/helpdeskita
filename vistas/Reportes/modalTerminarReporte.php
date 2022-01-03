<form id="frmterminarReporte" method="POST" onsubmit="return terminarReporte()">

<!-- Modal Agregar -->
<div class="modal fade" id="modalterminarReporte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asignar o terminar un reporte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

        <!-- Formulario en modal -->
        <div class="row">
            <div class="col-sm-4">
                <label for="idReporte"> Reporte </label>
                <input type="text" class="form-control" id="tipoServicio" name="tipoServicio" required>
            </div>
            <div class="col-sm-4">
                <label for="tipoServicio"> Tipo de servicio </label>
                <input type="text" class="form-control" id="tipoServicio" name="tipoServicio" required>
            </div>
            <div class="col-sm-4">
                <label for="asignado"> Asignado a: </label>
                <input type="text" class="form-control" id="asignado" name="asignado" required>
            </div>
            <div class="col-sm-4">
                <label for="fechaRealizacion"> Fecha de realizacion </label>
                <input type="date" class="form-control" id="fechaRealizacion" name="fechaRealizacion" required>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <label for="trabajoRealizado"> Trabajo Realizado </label>
                <textarea name="trabajoRealizado" id="trabajoRealizado" class="form-control" required></textarea>
            </div>
            <div class="col-sm-4">
                <label for="verificadoLiberado"> Verificado y Liberado </label>
                <input type="text" class="form-control" id="verificadoLiberado" name="verificadoLiberado" required>
            </div>
      </div>
      <div class="modal-footer">
        <span class="btn btn-secondary" data-dismiss="modal">Cerrar</span>
        <button class="btn btn-primary">Crear</button>
      </div>
    </div>
  </div>
</div>

</form>