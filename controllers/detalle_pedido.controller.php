<?php
// Se incluye el archivo externo que contiene la definición de la clase detalle_pedido.
require_once('../models/detalle_pedido.model.php');

// Desactiva la visualización de mensajes de error o advertencia.
error_reporting(0);

// Se crea una instancia de la clase detalle_pedido.
$DetallesP = new detalle_pedido;

switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $DetallesP->todos();  // Se llama al método 'todos' de la clase detalle_pedido para obtener todos los detalles de los pedidos.
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;  // Se guarda cada fila de resultados en un array llamado $todos.
        }
        echo json_encode($todos);  // Se convierte el array $todos a formato JSON y se imprime en pantalla.
        break;

    case 'insertar':
        $codigo_pedido  = $_POST['nombre_cliente'];  // Se obtienen los datos del detalle del pedido de las variables POST.
        $codigo_producto  = $_POST['nombre_contacto'];
        $cantidad = $_POST['apellido_contacto'];
        $precio_unidad = $_POST['telefono'];
        $numero_linea = $_POST['fax'];
        $datos = array();
        $datos = $DetallesP->Insertar($codigo_pedido, $codigo_producto, $cantidad, $precio_unidad, $numero_linea);  // Se llama al método 'Insertar' de la clase detalle_pedido para agregar un nuevo detalle del pedido a la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;

    case 'actualizar':
        $codigo_pedido  = $_POST['nombre_cliente'];  // Se obtienen los datos actualizados del detalle del pedido de las variables POST.
        $codigo_producto  = $_POST['nombre_contacto'];
        $cantidad = $_POST['apellido_contacto'];
        $precio_unidad = $_POST['telefono'];
        $numero_linea = $_POST['fax'];
        $datos = array();
        $datos = $DetallesP->Actualizar($codigo_pedido, $codigo_producto, $cantidad, $precio_unidad, $numero_linea);  // Se llama al método 'Actualizar' de la clase detalle_pedido para actualizar los datos de un detalle del pedido existente en la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;

    case 'eliminar':
        $codigo_pedido  = $_POST['nombre_cliente'];  // Se obtienen los datos del detalle del pedido a eliminar de las variables POST.
        $codigo_producto  = $_POST['nombre_contacto'];
        $datos = array();
        $datos = $DetallesP->Eliminar($codigo_pedido, $codigo_producto);  // Se llama al método 'Eliminar' de la clase detalle_pedido para eliminar un detalle del pedido de la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;
}
?>
