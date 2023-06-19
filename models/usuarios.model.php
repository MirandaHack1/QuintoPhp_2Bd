<?php
//TODO: archivos requeridos
require_once('../config/config.php');
require_once('usuariosroles.model.php');

class UsuariosModel
{
    public function login($correo, $contrasenia)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT usuario.*, roles.* FROM usuario INNER JOIN Usuarios_Roles on usuario.idUsaurio = Usuarios_Roles.idUsuario INNER JOIN roles on Usuarios_Roles.idRoles = roles.idRoles WHERE correo = '$correo' and contrasenia='$contrasenia'";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    public function todos(){  //TODO: CProcedimeinto para obtener todos los registros de la BDD
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM usuario INNER JOIN Usuarios_Roles on usuario.idUsaurio = Usuarios_Roles.idUsuario INNER JOIN roles on Usuarios_Roles.idRoles = roles.idRoles ORDER BY Apellidos";
        $datos = mysqli_query($con,$cadena);
        return $datos;
    }
    public function Insertar($Nombres, $Apellidos, $correo, $contrasenia, $idRoles){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `usuario`(`Nombres`, `Apellidos`, `contrasenia`, `correo`) VALUES ('$Nombres','$Apellidos','$contrasenia','$correo')";
        $datos = mysqli_query($con,$cadena);
        if(mysqli_insert_id($con) > 0){
            //definir el modelo usuarios_roles
            $UsuarioRoles = new UsuariosRolesModel();
            return $UsuarioRoles->Insertar(mysqli_insert_id($con), $idRoles);
        }else{
            return 'Error al insertar el rol del usuario';
        }
    }

    public function uno($idUsuario){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT usuario.*, roles.* FROM `usuario` INNER JOIN Usuarios_Roles on usuario.idUsaurio = Usuarios_Roles.idUsuario INNER JOIN roles on Usuarios_Roles.idRoles = roles.idRoles where usuario.idUsaurio = $idUsuario";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }

   /* public function Actualizar($idUsuario, $Nombres, $Apellidos, $correo, $contrasenia, $idRoles){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `usuario` SET `Nombres`='$Nombres',`Apellidos`='$Apellidos',`contrasenia`='$contrasenia',`correo`='$correo' WHERE idUsaurio=$idUsuario ";
        try {
            $datos = mysqli_query($con,$cadena);
            $UsuarioRoles = new UsuariosRolesModel();
            $UsuarioRoles->Actualizar($idUsuario, $idRoles);
            return 'ok';
        } catch (Throwable $th) {
            return json_encode($th->getMessage());
        }
       
    }*/


}
