function loginusuario()
{
    $.ajax({
        type:"POST",
        data:$('#frmlogin').serialize(),
        url:"procesos/usuarios/login/loginUsuarios.php",
        success:function(respuesta)
        {
            respuesta = respuesta.trim();
            console.log(respuesta);
            if(respuesta == 1)
            {
                window.location.href = "vistas/inicio.php";
            }
            else
            {
                Swal.fire("Error al iniciar sesión","Datos incorrectos","error");
            }
        }
    });


    return false;
}