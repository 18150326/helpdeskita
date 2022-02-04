<form id="frmterminarReporte" method="POST" onsubmit="return terminarReporte(<?php echo $mostrar['idReporte'];?>)">

<!-- Modal Agregar -->
<div class="modal fade" id="modalterminarReporte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Terminar un reporte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <!-- Formulario en modal -->
        <div class="row">
            <div class="col-sm-4">
                <label for="idReporte"> ID reporte </label>
                <input type="text" class="form-control" id="idReporte" name="idReporte" required >
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
                <input type="date" class="form-control" id="fechaVerificado" name="fechaVerificado" required>
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
        <a class="btn btn-primary" href="#" id="button-terminar_reporte">Terminar reporte</a>
      </div>
    </div>
  </div>
</div>

</form>

<script>
    document.getElementById("button-terminar_reporte").addEventListener("click", async function (e) {
        // Convertimos la información del formulario en un dataForm para leerlo en json
        const form = document.getElementById("frmterminarReporte");
        const dataForm = new FormData(form);

        // Posteriormente madaremos la información por medio de fetch
        const res = await fetch("../procesos/reportes/crud/terminarReporte.php",{        
            method: "POST",
            body: dataForm
        });        

        const data = await res.json();
        if(data == 1){
            Swal.fire("Operación realizada","¡Reporte terminado! ","success");
            $('#cargartablareportes').load("Reportes/tablareportesP_Admin.php");
        }else{
            Swal.fire("Operación no realizada","Error al realizar el reporte", "error");
        }

    })
</script>