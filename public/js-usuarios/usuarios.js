$(document).ready(function()
{
    $('#cargartablausuarios').load("Usuarios/tablausuarios.php");
});


function agregarNuevoUsuario()
{
    $.ajax({

        type: "POST",
        data: $('#frmAgregarUsuario').serialize(),
        url: "../procesos/usuarios/crud/agregarNuevoUsuario.php",
        success:function(respuesta)
        {
            respuesta = respuesta.trim();
            if(respuesta == 1)
            {
                $('#cargartablausuarios').load("Usuarios/tablausuarios.php");
                $('#frmAgregarUsuario')[0].reset();
                Swal.fire("Operación realizada","Agregado con exito! " + respuesta,"success");

            }
            else
            {
                Swal.fire("Operación no realizada","Error al agregar" + respuesta, "error");
            }
        }

    });
    

    return false;
}

function obtenerDatosUsuario(idUsuario)
{
    $.ajax({
    
        type: "POST",
        data: "idUsuario=" + idUsuario,
        url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success:function(respuesta)
        {
            respuesta = jQuery.parseJSON(respuesta);
            //console.log(respuesta);
            $('#idUsuario').val(respuesta['idUsuario']);
            $('#paternou').val(respuesta['ApPaterno']);
            $('#maternou').val(respuesta['ApMaterno']);
            $('#nombreu').val(respuesta['nombrePersona']);
            $('#fechaInu').val(respuesta['fechaAlta']);
            $('#telefonou').val(respuesta['telefono']);
            $('#correou').val(respuesta['correo']);
            $('#usuariou').val(respuesta['nombreUsuario']);
            $('#idRolu').val(respuesta['idRol']);
            $('#ubicacionu').val(respuesta['ubicacion']);
            $('#contraseñau').val(respuesta['contraseña']);
        }

    });
}

function editarUsuario()
{
    $.ajax({
        type: "POST",
        data: $('#frmEditarUsuario').serialize(),
        url: "../procesos/usuarios/crud/editarUsuario.php",
        success:function(respuesta)
        {
            //console.log(respuesta);
            respuesta = respuesta.trim();
            if(respuesta == 1)
            {
                $('#cargartablausuarios').load("Usuarios/tablausuarios.php");
                Swal.fire("Operación realizada","Editado con exito! " + respuesta,"success");

            }
            else
            {
                Swal.fire("Operación no realizada","Error al editar" + respuesta, "error");
            }
        }
    });
    
    return false;
}