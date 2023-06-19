<?php
//crear las instacias 
require_once('../config/configJar.php');

class PagosModel{
    public function todos(){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `pago`";
        $datos = mysqli_query($con,$cadena);
        return $datos;
    }
    public function uno($codigo_cliente,$id_transaccion){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `pago` WHERE `codigo_cliente`=$codigo_cliente and `id_transaccion`=$id_transaccion";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        }
    }
    public function insertar($codigo_cliente, $forma_pago, $id_transaccion, $fecha_pago, $total){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `pago`(`codigo_cliente`, `forma_pago`, `id_transaccion`, `fecha_pago`, `total`) VALUES ($codigo_cliente,'$forma_pago','$id_transaccion','$fecha_pago',$total) ";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        }
    }
    public function eliminar($id_transaccion){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `pago` WHERE `id_transaccion`='$id_transaccion'";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        }
    }
}
