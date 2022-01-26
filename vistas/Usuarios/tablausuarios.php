<?php
    include "../../clases/conexion.php";
    $con = new conexion();
    $conexion1 = $con->conectar();
    $sql = "SELECT 
                usuarios.id_usuario AS idUsuario,
                usuarios.usuario AS nombreUsuario,
                roles.nombre AS rol,
                usuarios.id_rol AS idRol,
                usuarios.ubicacion AS ubicacion,
                usuarios.estado AS estatus,
                usuarios.id_Persona AS idPersona,
                persona.nombre AS nombrePersona,
                persona.paterno AS ApPaterno,
                persona.materno AS ApMaterno,
                persona.fechaInsert AS fechaAlta,
                persona.correo AS correo,
                persona.telefono AS telefono
            FROM
                t_usuarios AS usuarios
                    INNER JOIN
                t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
                    INNER JOIN
                t_persona AS persona ON usuarios.id_persona = persona.id_persona";
    $respuesta = mysqli_query($conexion1, $sql) or die(mysqli_error($conexion1));
?>

<table class="table table-sm dt-responsive nowrap" id="tablaUsuariosDataTable" style="width:100%">

    <thead>

        <th>Apellido paterno</th>
        <th>Apellido materno</th>
        <th>Nombre</th>
        <th>Fecha de alta</th>
        <th>Telefono</th>
        <th>Ubicacion</th>
        <th>Correo</th>
        <th>Usuario</th>
        <th>Estado</th>
        <th>Editar</th>
    
    </thead>

    <tbody>
        
        <?php
            while($mostrar = mysqli_fetch_array($respuesta)){
        ?>

        <tr>

            <td><?php echo $mostrar['ApPaterno']; ?></td>
            <td><?php echo $mostrar['ApMaterno']; ?></td>
            <td><?php echo $mostrar['nombrePersona']; ?></td>
            <td><?php echo $mostrar['fechaAlta']; ?></td>
            <td><?php echo $mostrar['telefono']; ?></td>
            <td><?php echo $mostrar['ubicacion']; ?></td>
            <td><?php echo $mostrar['correo']; ?></td>
            <td><?php echo $mostrar['nombreUsuario']; ?></td>

            <td>
                <?php if($mostrar['estatus'] == 1) {?>
                    <button class="btn btn-info btn-sm">
                        Activo
                    </button>
                <?php
                } else {
                ?>
                    <button class="btn btn-info btn-sm">
                        Inactivo
                    </button>
                <?php
                    } 
                ?>
            </td>
            
            <td>
                <?php if($mostrar['estatus'] ==1 ){?>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditarUsuarios" 
                            onclick= "obtenerDatosUsuario(<?php echo $mostrar['idUsuario'] ?>)">
                        Editar
                    </button>
                <?php
                } else {
                ?>
                    <button class="btn btn-warning btn-sm" disabled>
                        Editar
                    </button>
                <?php
                }
                ?>

            </td>
        
        </tr>
    
        <?php
        }
        ?>

    </tbody>

</table>

<script>
    $(document).ready(function(){
       $('#tablaUsuariosDataTable').DataTable(); 
    });
</script>