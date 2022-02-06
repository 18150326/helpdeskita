<form id="frmFirmar" method="POST" onsubmit="return FirmarReporte(<?php echo $mostrar ['idReporte'];?>)">

<!-- Modal Firmar -->
<div class="modal fade" id="modalFirmarReporte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Aviso de confirmación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="text" id="idReporteF" name="idReporteF" hidden>
      <div class="modal-body">
        <!-- Formulario en modal -->
        <div class="row">
            <div class="col-sm-12">
                <label for="men"> Al hacer click en aceptar, se da por hecho que el documento está firmado y listo para
                  ser recogido por el personal de centro de cómputo, ¿esta seguro/a de esto?
                </label>
            </div>
        </div>
      </div>

      <div class="modal-footer">
        <span class="btn btn-secondary" data-dismiss="modal">Cerrar</span>
        <a class="btn btn-primary" href="#" id="button-firmar">Aceptar</a>
      </div>
    </div>
  </div>
</div>

</form>

<script>
document.getElementById("button-firmar").addEventListener("click",async function(){
const form = document.getElementById("frmFirmar");
const dataform = new FormData(form);
const res = await fetch("../procesos/reportes/crud/firma.php", {
  method: "POST", body: dataform
});
const data = await res.json();
if(data == 1){
  Swal.fire("Operación realizada","¡Se le ha avisado al centro cómputo! ","success");
  $('#cargartablareportes').load("Reportes/tablareportes.php");
}else{
  Swal.fire("Operación no realizada","Error al realizar la firma", "error");
}

});

</script>