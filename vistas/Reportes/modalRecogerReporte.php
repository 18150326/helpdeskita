<form id="frmRecoger" method="POST" onsubmit="return RecogerReporte(<?php echo $mostrar ['idReporte'];?>)">

<!-- Modal Recoger -->
<div class="modal fade" id="modalRecoger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Aviso de confirmación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="text" id="idReporteR" name="idReporteR" hidden>
      <div class="modal-body">
        <!-- Formulario en modal -->
        <div class="row">
            <div class="col-sm-12">
                <label for="men"> Al hacer click en aceptar, se da por hecho que el documento fue recogido por el personal
                    del centro de cómputo y se le confirmará al solicitante del servicio sobre esto, ¿está seguro/a?
                </label>
            </div>
        </div>
      </div>

      <div class="modal-footer">
        <span class="btn btn-secondary" data-dismiss="modal">Cerrar</span>
        <a class="btn btn-primary" href="#" id="button-recoger">Aceptar</a>
      </div>
    </div>
  </div>
</div>

</form>

<script>
document.getElementById("button-recoger").addEventListener("click",async function(){
const form = document.getElementById("frmRecoger");
const dataform = new FormData(form);
const res = await fetch("../procesos/reportes/crud/recogerReporte.php", {
  method: "POST", body: dataform
});
const data = await res.json();
console.log(data);
if(data == 1){
  Swal.fire("Operación realizada","¡Se le ha confirmado al solicitante! ","success");
  $('#cargartablareportes').load("Reportes/tablareportesT_Admin.php");
}else{
  Swal.fire("Operación no realizada","Error al realizar la operación", "error");
}

});

</script>