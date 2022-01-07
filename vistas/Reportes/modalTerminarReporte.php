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
                <label for="idReporte"> ID reporte </label>
                <input type="text" class="form-control" id="tipoServicio" name="tipoServicio" required>
            </div>
            
            <div class="col-sm-5">
                <label for="mantenimiento">Mantenimiento</label>
                <select name="mantenimiento" id="mantenimiento" class="form-control" required>
                    <option value="1">Interno</option>
                    <option value="2">Externo</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label for="tipoServicio"> Tipo de servicio: </label>
                <input type="text" class="form-control" id="tipoServicio" name="tipoServicio" required>
            </div>
            <div class="col-sm-4">
                <label for="asignado"> Asignado a: </label>
                <input type="text" class="form-control" id="asignado" name="asignado" required>
            </div>
            <div class="col-sm-5">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="1">Pendiente</option>
                    <option value="2">Terminado</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-5">
                <label for="fechaRealizacion"> Fecha de realizacion </label>
                <input type="date" class="form-control" id="fechaRealizacion" name="fechaRealizacion" required>
            </div>
            <div class="col-sm-12">
                <label for="trabajoRealizado"> Trabajo Realizado </label>
                <textarea name="trabajoRealizado" id="trabajoRealizado" class="form-control" required></textarea>
            </div>
            <div class="col-sm-9">
                 <label for="verificadoLiberado"> Verificado y Liberado por: </label>
                 <input type="text" class="form-control" name="verificadoLiberado" id="verificadoLiberado" required>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-5">
                <label for="fechaVerificacion"> Fecha de verificación </label>
                <input type="date" class="form-control" id="fechaVerificacion" name="fechaVerificacion" required>
            </div>
            <div class="col-sm-9">
                <label for="aprobado">Aprobado por:</label>
                <select name="aprobado" id="aprobado" class="form-control" required>
                    <option value="1">I.S.C José Roberto Aguilera Fernández</option>
                    <option value="2">Angel</option>
                </select>
            </div>
            <div class="col-sm-5">
                <label for="fechaAprobado"> Fecha de aprobación: </label>
                <input type="date" class="form-control" id="fechaAprobado" name="fechaAprobado" required>
            </div>
        </div>



      </div>
      <div class="modal-footer">
        <span class="btn btn-secondary" data-dismiss="modal">Cerrar</span>
        <span class="btn btn-secondary" data-dismiss="modal">Guardar datos</span>
        <button class="btn btn-primary">Terminar reporte</button>
      </div>
    </div>
  </div>
</div>

</form>