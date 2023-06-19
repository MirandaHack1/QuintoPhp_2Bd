<?php
//TODO: Clase Pedido es un modelo
require_once('../models/pedido.model.php');  // Se incluye el archivo externo que contiene la definición de la clase Pedido.

//TODO: Manejo de errores
error_reporting(0);  // Desactiva la visualización de mensajes de error o advertencia.

//TODO: Importación de Clase pedidos
$Pedido = new pedido;  // Se crea una instancia de la clase Pedido.

switch ($_GET["op"]) {  // Se utiliza el valor del parámetro 'op' pasado a través de la URL para determinar la operación a realizar.

    case 'todos':
        $datos = array();
        $datos = $Pedido->todos();  // Se llama al método 'todos' de la clase Pedido para obtener todos los pedidos.
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;  // Se guarda cada fila de resultados en un array llamado $todos.
        }
        echo json_encode($todos);  // Se convierte el array $todos a formato JSON y se imprime en pantalla.
        break;

    case 'uno':
        $codigo_pedido  = $_POST['codigo_producto'];  // Se obtiene el código de pedido de la variable POST.
        $datos = array();
        $datos = $codigo_pedido->uno($codigo_pedido);  // ERROR: Parece haber un error aquí. '$codigo_pedido' no parece ser un objeto válido.
        $respuesta = mysqli_fetch_assoc($datos);  // Se obtiene una fila de resultado y se guarda en $respuesta.
        echo json_encode($respuesta);  // Se convierte $respuesta a formato JSON y se imprime en pantalla.
        break;

    case 'insertar':
        $fecha_pedido = $_POST['fecha_pedido'];  // Se obtienen los datos del pedido de las variables POST.
        $fecha_pedidoma  = $_POST['fecha_pedido '];
        $fecha_entrega = $_POST['fecha_entrega'];
        $estado = $_POST['estado'];
        $comentarios = $_POST['comentarios'];
        $codigo_cliente  = $_POST['codigo_cliente '];
        $datos = array();
        $datos = $Pedido->Insertar($fecha_pedido, $fecha_pedidoma, $fecha_entrega, $estado, $comentarios, $codigo_cliente);  // Se llama al método 'Insertar' de la clase Pedido para agregar un nuevo pedido a la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;
        
    case 'actualizar':
        $codigo_pedido  = $_POST['codigo_pedido'];  // Se obtienen los datos actualizados del pedido de las variables POST.
        $fecha_pedido = $_POST['fecha_pedido'];
        $fecha_pedidoma  = $_POST['fecha_pedido '];
        $fecha_entrega = $_POST['fecha_entrega'];
        $estado = $_POST['estado'];
        $comentarios = $_POST['comentarios'];
        $codigo_cliente  = $_POST['codigo_cliente '];
        $datos = array();
        $datos = $Pedido->Actualizar(  $codigo_pedido,$fecha_pedido, $fecha_pedidoma, $fecha_entrega, $estado, $comentarios, $codigo_cliente);  // Se llama al método 'Actualizar' de la clase Pedido para actualizar un pedido existente en la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;

    case 'eliminar':
        $codigo_pedido  = $_POST['codigo_pedido'];  // Se obtiene el código de pedido a eliminar de la variable POST.
        $datos = array();
        $datos = $Pedido->Eliminar($codigo_pedido);  // Se llama al método 'Eliminar' de la clase Pedido para eliminar un pedido de la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;
}
?>