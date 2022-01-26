<form id="frmEditarUsuario" method="POST" onsubmit="return editarUsuario()">

<!-- Modal Agregar -->
<div class="modal fade" id="modalEditarUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <input type="text" id="idUsuario" name="idUsuario" >
        <!-- Formulario en modal -->
        <div class="row">
            <div class="col-sm-4">
                <label for="paternou"> Apellido paterno </label>
                <input type="text" class="form-control" id="paternou" name="paternou" required>
            </div>
            <div class="col-sm-4">
                <label for="maternou"> Apellido materno </label>
                <input type="text" class="form-control" id="maternou" name="maternou" required>
            </div>
            <div class="col-sm-4">
                <label for="nombreu"> Nombre/s </label>
                <input type="text" class="form-control" id="nombreu" name="nombreu" required>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label for="fechaInu"> Fecha de alta </label>
                <input type="date" class="form-control" id="fechaInu" name="fechaInu" required>
            </div>
            <div class="col-sm-4">
                <label for="telefonou"> Telefono </label>
                <input type="text" class="form-control" id="telefonou" name="telefonou" required>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label for="Correou"> Correo </label>
                <input type="mail" class="form-control" id="correou" name="correou" required>
            </div>
            <div class="col-sm-4">
                <label for="usuariou"> Usuario </label>
                <input type="text" class="form-control" id="usuariou" name="usuariou" required>
            </div>
            <div class="col-sm-4">
                <label for="contraseñau"> Contraseña </label>
                <input type="text" class="form-control" id="contraseñau" name="contraseñau" required>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <label for="idRolu">Rol de usuario</label>
                <select name="idRolu" id="idRolu" class="form-control" required>
                    <option value="1">Cliente</option>
                    <option value="2">Administrador</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <label for="ubicacionu">Ubicación</label>
                <textarea name="ubicacionu" id="ubicacionu" class="form-control" required></textarea>
            </div>
        </div>


      </div>
      <div class="modal-footer">
        <span class="btn btn-secondary" data-dismiss="modal">Cerrar</span>
        <button class="btn btn-warning">Editar</button>
      </div>
    </div>
  </div>
</div>

</form>