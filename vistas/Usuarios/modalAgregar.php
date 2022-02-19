<form id="frmAgregarUsuario" method="POST" onsubmit="return agregarNuevoUsuario()">

<!-- Modal Agregar -->
<div class="modal fade" id="modalAgregarUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

        <!-- Formulario en modal -->
        <div class="row">
            <div class="col-sm-4">
                <label for="paterno"> Apellido paterno </label>
                <input type="text" class="form-control" id="paterno" name="paterno" required>
            </div>
            <div class="col-sm-4">
                <label for="materno"> Apellido materno </label>
                <input type="text" class="form-control" id="materno" name="materno" required>
            </div>
            <div class="col-sm-4">
                <label for="nombre"> Nombre/s </label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label for="fechaIn"> Fecha de alta </label>
                <input type="date" class="form-control" id="fechaIn" name="fechaIn" required>
            </div>
            <div class="col-sm-4">
                <label for="telefono"> Telefono </label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label for="Correo"> Correo </label>
                <input type="mail" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="col-sm-4">
                <label for="usuario"> Usuario </label>
                <input type="text" class="form-control" id="usuario" name="usuario" required>
            </div>
            <div class="col-sm-4">
                <label for="contraseña"> Contraseña </label>
                <input type="text" class="form-control" id="contraseña" name="contraseña" required>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <label for="idRol">Rol de usuario</label>
                <select name="idRol" id="idRol" class="form-control" required>
                    <option value="1">Cliente</option>
                    <option value="2">Administrador</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <label for="ubicacion">Departamento</label>
                <textarea name="ubicacion" id="ubicacion" class="form-control" required></textarea>
            </div>
        </div>


      </div>
      <div class="modal-footer">
        <span class="btn btn-secondary" data-dismiss="modal" id="button_cerrarA">Cerrar</span>
        <button class="btn btn-primary">Agregar</button>
      </div>
    </div>
  </div>
</div>

</form>