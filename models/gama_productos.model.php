<?php
//crear las instacias 
require_once('../config/configJar.php');

class gama_productosModel{
    public function todos(){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `gama_producto`";
        $datos = mysqli_query($con,$cadena);
        return $datos;
    }
    public function uno($gama){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `gama_producto` where `gama`='$gama'";
        $datos = mysqli_query($con,$cadena);
        return $datos;
    }
    public function insertar($gama, $descripcion_texto, $descripcion_html, $imagen){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `gama_producto`(`gama`, `descripcion_texto`, `descripcion_html`, `imagen`) VALUES ('$gama','$descripcion_texto','$descripcion_html','$imagen')";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        }
    }
    public function actualizar($gama, $descripcion_texto, $descripcion_html, $imagen){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `gama_producto` SET `descripcion_texto`='$descripcion_texto',`descripcion_html`='$descripcion_html',`imagen`='$imagen' WHERE `gama`='$gama'";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        }
    }
    public function eliminar($gama){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `gama_producto` WHERE gama=$gama";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        }
    }
}
