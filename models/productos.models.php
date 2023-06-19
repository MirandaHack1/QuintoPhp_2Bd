<?php
//crear las instacias 
require_once('../config/configJar.php');

class productosModel{
    public function todos(){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `producto` INNER JOIN gama_producto on producto.gama = gama_producto.gama";
        $datos = mysqli_query($con,$cadena);
        return $datos;
    }
    public function uno($codigo_producto){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `producto` INNER JOIN gama_producto on producto.gama = gama_producto.gama where `codigo_producto`='$codigo_producto'";
        $datos = mysqli_query($con,$cadena);
        return $datos;
    }
    public function insertar($codigo_producto, $nombre, $gama, $dimensiones, $proveedor, $descripcion, $cantidad_en_stock, $precio_venta, $precio_proveedor){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `producto`(`codigo_producto`, `nombre`, `gama`, `dimensiones`, `proveedor`, `descripcion`, `cantidad_en_stock`, `precio_venta`, `precio_proveedor`) VALUES ('$codigo_producto','$nombre','$gama','$dimensiones','$proveedor','$descripcion','$cantidad_en_stock','$precio_venta','$precio_proveedor')";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        }
    }
    public function actualizar($codigo_producto, $nombre, $gama, $dimensiones, $proveedor, $descripcion, $cantidad_en_stock, $precio_venta, $precio_proveedor){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `producto` SET `nombre`='$nombre',`gama`='$gama',`dimensiones`='$dimensiones',`proveedor`='$proveedor',`descripcion`='$descripcion',`cantidad_en_stock`='$cantidad_en_stock',`precio_venta`='$precio_venta',`precio_proveedor`='$precio_proveedor' WHERE `codigo_producto`='$codigo_producto'";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        }
    }
    public function eliminar($codigo_producto){
        $con = new ClaseConexion();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `producto` WHERE codigo_producto=$codigo_producto";
        if (mysqli_query($con, $cadena)){
            return 'ok';
        }else{
            return mysqli_error($con);
        }
    }
}
