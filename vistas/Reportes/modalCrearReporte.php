<form id="frmcrearReporte" method="POST" onsubmit="return crearReporte()">

<!-- Modal Agregar -->
<div class="modal fade" id="modalcrearReporte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear un nuevo reporte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <input type="text" id="idUsuario" name="idUsuario" class="d-none">
        <!-- Formulario en modal -->
        <div class="row">
            
            <div class="col-sm-4">
                <label for="areaSolicitante"> Area Solicitante </label>
                <input type="text" class="form-control" id="areaSolicitante" name="areaSolicitante" required>
            </div>
            <div class="col-sm-7">
                <label for="nombreSolicitante"> Nombre del solicitante </label>
                <input type="text" class="form-control" id="nombreSolicitante" name="nombreSolicitante" required>
            </div>
            <div class="col-sm-5" style="margin-top: 10px">
                <label for="fechaElaboracion"> Fecha de elaboracion </label>
                <input type="date" class="form-control" id="fechaElaboracion" name="fechaElaboracion" required>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <label for="descripcion"> Descripción del servicio solicitado o falla a reparar </label>
                <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <span class="btn btn-secondary" data-dismiss="modal">Cerrar</span>
        <button class="btn btn-primary" >Crear</button>
      </div>
    </div>
  </div>
</div>

</form>