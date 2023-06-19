<?php
require_once('../models/gama_productos.model.php');  // Se incluye el archivo externo que contiene la definición de la clase gama_productosModel.

error_reporting(0);  // Desactiva la visualización de mensajes de error o advertencia.

$gamaP = new gama_productosModel;  // Se crea una instancia de la clase gama_productosModel.

switch ($_GET["op"]) {  // Se utiliza el valor del parámetro 'op' pasado a través de la URL para determinar la operación a realizar.

    case 'todos':
        $datos = array();
        $datos = $gamaP->todos();  // Se llama al método 'todos' de la clase gama_productosModel para obtener todas las gamas de productos.
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;  // Se guarda cada fila de resultados en un array llamado $todos.
        }
        echo json_encode($todos);  // Se convierte el array $todos a formato JSON y se imprime en pantalla.
        break;

    case 'uno':
        $gama  = $_POST['gama'];  // Se obtiene el nombre de la gama de productos de la variable POST.
        $datos = array();
        $datos = $gamaP->uno($gama);  // Se llama al método 'uno' de la clase gama_productosModel para obtener una gama de productos específica.
        $respuesta = mysqli_fetch_assoc($datos);  // Se obtiene una fila de resultado y se guarda en $respuesta.
        echo json_encode($respuesta);  // Se convierte $respuesta a formato JSON y se imprime en pantalla.
        break;

    case 'insertar':
        $gama  = $_POST['gama'];  // Se obtienen los datos de la gama de productos de las variables POST.
        $descripcion_texto = $_POST['descripcion_texto'];
        $descripcion_html = $_POST['descripcion_html'];
        $imagen  = $_POST['imagen'];
        $datos = array();
        $datos = $gamaP->Insertar($gama, $descripcion_texto, $descripcion_html, $imagen);  // Se llama al método 'Insertar' de la clase gama_productosModel para agregar una nueva gama de productos a la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;

    case 'actualizar':
        $gama  = $_POST['gama'];  // Se obtienen los datos actualizados de la gama de productos de las variables POST.
        $descripcion_texto = $_POST['descripcion_texto'];
        $descripcion_html = $_POST['descripcion_html'];
        $imagen  = $_POST['imagen'];
        $datos = array();
        $datos = $gamaP->Actualizar($gama, $descripcion_texto, $descripcion_html, $imagen);  // Se llama al método 'Actualizar' de la clase gama_productosModel para actualizar los datos de una gama de productos existente en la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;

    case 'eliminar':
        $gama  = $_POST['gama'];  // Se obtiene el nombre de la gama de productos de la variable POST.
        $datos = array();
        $datos = $gamaP->Eliminar($gama);  // Se llama al método 'Eliminar' de la clase gama_productosModel para eliminar una gama de productos de la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;
}
?>
