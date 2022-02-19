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
                document.getElementById("button_cerrarA").click();
                Swal.fire("Operación realizada","Agregado con exito! ","success");
            }
            else
            {
                Swal.fire("Operación no realizada","Error al agregar", "error");
            }
        }

    });


    return false;
}

async function obtenerDatosUsuario(idUsuario)
{
    const dataSend = {
      "idUsuario": idUsuario
    }
    
    const res = await fetch("../procesos/usuarios/crud/obtenerDatosUsuario.php",{
        body: JSON.stringify(dataSend),
        method: "POST"
    });

    const data = await res.json();
    
    
    $('#idUsuario').val(data['idUsuario']);
    $('#paternou').val(data['ApPaterno']);
    $('#maternou').val(data['ApMaterno']);
    $('#nombreu').val(data['nombrePersona']);
    $('#fechaInu').val(data['fechaAlta']);
    $('#telefonou').val(data['telefono']);
    $('#correou').val(data['correo']);
    $('#usuariou').val(data['nombreUsuario']);
    $('#idRolu').val(data['idRol']);
    $('#ubicacionu').val(data['ubicacion']);
    $('#contraseñau').val(data['contraseña2']);
    /*$.ajax({

        type: "POST",
        data: "idUsuario=" + idUsuario,
        url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success:function(respuesta)
        {
            respuesta = jQuery.parseJSON(respuesta);
            // console.log( jQuery.parseJSON(respuesta));
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
            $('#contraseñau').val(respuesta['contraseña2']);
        }

    });*/
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
                // document.getElementById("button_cerrarE").click();
                $('#frmEditarUsuario').modal('hide');
                Swal.fire("Operación realizada","Editado con exito! ","success");                
            }
            else
            {
                Swal.fire("Operación no realizada","Error al editar", "error");
            }
        }
    });

    return false;
}
