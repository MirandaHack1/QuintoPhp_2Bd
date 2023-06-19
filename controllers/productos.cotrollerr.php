<?php
//TODO: archvios externos
require_once('../models/productos.models.php');  // Se incluye el archivo externo que contiene la definición de la clase productosModel.

//TODO: Manejo de reportes
error_reporting(0);  // Desactiva la visualización de mensajes de error o advertencia.

//TODO: Importacion de clase productos
$Productos = new productosModel;  // Se crea una instancia de la clase productosModel.

switch ($_GET['OP']) {  // Se utiliza el valor del parámetro 'OP' pasado a través de la URL para determinar la operación a realizar.

    case 'todos':
        $datos = array();
        $datos = $Productos->todos();  // Se llama al método 'todos' de la clase productosModel para obtener todos los productos.
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;  // Se guarda cada fila de resultados en un array llamado $todos.
        }
        echo json_encode($todos);  // Se convierte el array $todos a formato JSON y se imprime en pantalla.
        break;

    case 'uno':
        $codigo_producto  = $_POST['codigo_producto '];  // Se obtiene el código de producto de la variable POST.
        $datos = array();
        $datos = $Productos->uno($codigo_producto );  // Se llama al método 'uno' de la clase productosModel para obtener un solo producto.
        $respuesta = mysqli_fetch_assoc($datos);  // Se obtiene una fila de resultado y se guarda en $respuesta.
        echo json_encode($respuesta);  // Se convierte $respuesta a formato JSON y se imprime en pantalla.
        break;

    case 'insertar':
        $codigo_producto  = $_POST['codigo_producto'];  // Se obtienen los datos del producto de las variables POST.
        $nombre = $_POST['nombre'];
        $gama  = $_POST['gama '];
        $dimensiones = $_POST['dimensiones'];
        $proveedor = $_POST['proveedor'];
        $descripcion = $_POST['descripcion'];
        $cantidad_en_stock = $_POST['cantidad_en_stock'];
        $precio_venta = $_POST['precio_venta'];
        $precio_proveedor = $_POST['precio_proveedor'];
        $datos = array();
        $datos = $Productos->insertar($codigo_producto,$nombre,$gama,$dimensiones,$proveedor,$descripcion, $cantidad_en_stock,$precio_venta,$precio_proveedor);  // Se llama al método 'insertar' de la clase productosModel para agregar un nuevo producto a la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;

    case 'actulizar':
        $codigo_producto  = $_POST['codigo_producto '];  // Se obtienen los datos actualizados del producto de las variables POST.
        $nombre = $_POST['nombre'];
        $gama  = $_POST['gama '];
        $dimensiones = $_POST['dimensiones'];
        $proveedor = $_POST['proveedor'];
        $descripcion = $_POST['descripcion'];
        $cantidad_en_stock = $_POST['cantidad_en_stock'];
        $precio_venta = $_POST['precio_venta'];
        $precio_proveedor = $_POST['precio_proveedor'];
        $datos = array();
        $datos = $Productos->Actualizar($codigo_producto,$nombre,$gama,$dimensiones,$proveedor,$descripcion, $cantidad_en_stock,$precio_venta,$precio_proveedor);  // Se llama al método 'Actualizar' de la clase productosModel para actualizar un producto existente en la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;

    case 'eliminar':
        $codigo_producto  = $_POST['codigo_producto '];  // Se obtiene el código de producto a eliminar de la variable POST.
        $datos = array();
        $datos = $Productos->Eliminar($codigo_producto);  // Se llama al método 'Eliminar' de la clase productosModel para eliminar un producto de la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;
}
?>

