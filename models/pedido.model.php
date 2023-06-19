<?php
//TODO: Requerimientos 
require_once('../config/configJar.php');
class pedido
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "select * from pedido";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($codigo_pedido)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM pedido WHERE codigo_pedido = $codigo_pedido";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($fecha_pedido, $fecha_esperada, $fecha_entrega, $estado, $comentarios, $codigo_cliente)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into pedido(fecha_pedido,fecha_esperada,fecha_entrega,estado,comentarios,codigo_cliente) values ( '$fecha_pedido', '$fecha_esperada', '$fecha_entrega', '$estado', '$comentarios', $codigo_cliente, )";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($codigo_pedido, $fecha_pedido, $fecha_esperada, $fecha_entrega, $estado, $comentarios, $codigo_cliente)
    {
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "update pedido set fecha_pedido='$fecha_pedido',fecha_esperada='$fecha_esperada',fecha_entrega='$fecha_entrega',estado='$estado',comentarios='$comentarios',codigo_cliente=$codigo_cliente where codigo_pedido= $codigo_pedido";
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
        $cadena = "delete from pedido where codigo_cliente = $codigo_cliente";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
    }
}
