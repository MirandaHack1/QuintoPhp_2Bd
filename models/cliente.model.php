<?php
//TODO: Requerimientos 
require_once('../config/configJar.php');
class cliente
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "select * from cliente";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($codigo_cliente)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM cliente WHERE codigo_cliente = $codigo_cliente";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($nombre_cliente, $nombre_contacto, $apellido_contacto, $telefono, $fax, $linea_direccion1, $linea_direccion2, $ciudad, $region, $pais, $codigo_postal, $codigo_empleado_rep_ventas, $limite_credito)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into cliente(nombre_cliente,nombre_contacto,apellido_contacto,telefono,fax,linea_direccion1,linea_direccion2,ciudad,region,pais,codigo_postal,codigo_empleado_rep_ventas,limite_credito) values ( '$nombre_cliente', '$nombre_contacto', '$apellido_contacto', '$telefono', '$fax', '$linea_direccion1', '$linea_direccion2', '$ciudad', '$region', '$pais', '$codigo_postal', $codigo_empleado_rep_ventas,  '$limite_credito')";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($codigo_cliente, $nombre_cliente, $nombre_contacto, $apellido_contacto, $telefono, $fax, $linea_direccion1, $linea_direccion2, $ciudad, $region, $pais, $codigo_postal, $codigo_empleado_rep_ventas, $limite_credito)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "update cliente set nombre_cliente='$nombre_cliente',nombre_contacto='$nombre_contacto',apellido_contacto='$apellido_contacto',telefono='$telefono',fax='$fax',linea_direccion1='$linea_direccion1',linea_direccion2='$linea_direccion2',ciudad='$ciudad',region='$region',pais='$pais',codigo_postal='$codigo_postal',codigo_empleado_rep_ventas=$codigo_empleado_rep_ventas,limite_credito='$limite_credito' where codigo_cliente= $codigo_cliente";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($codigo_cliente)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from cliente where codigo_cliente = $codigo_cliente";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
    }
}
