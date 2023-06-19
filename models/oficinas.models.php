<?php
//crear las instacias 
require_once('../config/configJar.php');

class OficinasModel{
    public function todos(){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `oficina`";
        $datos = mysqli_query($con,$cadena);
        return $datos;
    }
    public function uno($codigo_oficina){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `oficina` where `codigo_oficina`='$codigo_oficina'";
        $datos = mysqli_query($con,$cadena);
        return $datos;
    }
    public function insertar($codigo_oficina,$ciudad, $pais,$region, $codigo_postal,$telefono,$linea_direccion1,$linea_direccion2){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `oficina`(`codigo_oficina`, `ciudad`, `pais`, `region`, `codigo_postal`, `telefono`, `linea_direccion1`, `linea_direccion2`) VALUES ('$codigo_oficina','$ciudad','$pais','$region','$codigo_postal','$telefono','$linea_direccion1','$linea_direccion2')";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        }
    }
    public function actualizar($codigo_oficina,$ciudad, $pais,$region, $codigo_postal,$telefono,$linea_direccion1,$linea_direccion2){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `oficina` SET `ciudad`='$ciudad]',`pais`='$pais',`region`='$region',`codigo_postal`='$codigo_postal',`telefono`='$telefono',`linea_direccion1`='$linea_direccion1',`linea_direccion2`='$linea_direccion2' WHERE `codigo_oficina`='$codigo_oficina'";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        }
    }
    public function eliminar($codigo_oficina){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `oficina` WHERE codigo_oficina=$codigo_oficina";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        }
    }
}
