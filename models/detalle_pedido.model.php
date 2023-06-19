<?php
//TODO: Requerimientos 
require_once('../config/configJar.php');
class detalle_pedido
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "select * from detalle_pedido";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($codigo_pedido, $codigo_producto)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM detalle_pedido WHERE  codigo_pedido= $codigo_pedido,codigo_producto ='$codigo_producto'";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($codigo_pedido, $codigo_producto,$cantidad, $precio_unidad, $numero_linea)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into detalle_pedido(codigo_pedido, codigo_producto,cantidad,precio_unidad,numero_linea) values ($codigo_pedido, $codigo_producto, $cantidad,  '$precio_unidad', '$numero_linea')";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($codigo_pedido, $codigo_producto, $cantidad, $precio_unidad, $numero_linea)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "update detalle_pedido set cantidad=$cantidad,precio_unidad='$precio_unidad',numero_linea='$numero_linea', where codigo_pedido= $codigo_pedido and codigo_producto='$codigo_producto'";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($codigo_pedido, $codigo_producto)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from detalle_pedido where WHERE  codigo_pedido= $codigo_pedido,codigo_producto ='$codigo_producto'";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
    }
}
