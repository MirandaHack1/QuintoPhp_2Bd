<?php
require_once('../models/pagos.model.php');  // Se incluye el archivo externo que contiene la definición de la clase PagosModel.

error_reporting(0);  // Desactiva la visualización de mensajes de error o advertencia.

//TODO: Importacion de clase pagos
$Pagos = new PagosModel;  // Se crea una instancia de la clase PagosModel.

switch ($_GET['OP']) {  // Se utiliza el valor del parámetro 'OP' pasado a través de la URL para determinar la operación a realizar.

    case 'todos':
        $datos = array();
        $datos = $Pagos->todos();  // Se llama al método 'todos' de la clase PagosModel para obtener todos los pagos.
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;  // Se guarda cada fila de resultados en un array llamado $todos.
        }
        echo json_encode($todos);  // Se convierte el array $todos a formato JSON y se imprime en pantalla.
        break;

    case 'uno':
        $codigo_cliente = $_POST['codigo_cliente'];  // Se obtiene el código de cliente y el ID de transacción de la variable POST.
        $id_transaccion = $_POST['id_transaccion'];
        $datos = array();
        $resultadoConsulta = $Pagos->uno($codigo_cliente, $id_transaccion);  // Se llama al método 'uno' de la clase PagosModel para obtener un pago específico.
        if ($resultadoConsulta instanceof mysqli_result) {  // Si el resultado de la consulta es un objeto mysqli_result válido.
            $datos = mysqli_fetch_assoc($resultadoConsulta);  // Se obtiene una fila de resultado y se guarda en $datos.
            echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        } else {
            // Manejar el caso cuando $resultadoConsulta no es un objeto mysqli_result válido
            // Puede mostrar un mensaje de error o tomar la acción apropiada según el caso.
        }
        break;

    case 'insertar':
        $codigo_cliente  = $_POST['codigo_oficina '];  // Se obtienen los datos del pago de las variables POST.
        $forma_pago  = $_POST['forma_pago'];
        $id_transaccion = $_POST['id_transaccion'];
        $fecha_pago = $_POST['fecha_pago'];
        $codigo_postal = $_POST['codigo_postal'];
        $total = $_POST['total'];
        $datos = array();
        $datos = $Pagos->Insertar($codigo_cliente, $forma_pago, $id_transaccion, $fecha_pago, $codigo_postal, $proveedor, $total);  // Se llama al método 'Insertar' de la clase PagosModel para agregar un nuevo pago a la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;

    case 'eliminar':
        $id_transaccion = $_POST['id_transaccion'];  // Se obtiene el ID de transacción del pago a eliminar de la variable POST.
        $datos = array();
        $datos = $Pagos->Eliminar($id_transaccion);  // Se llama al método 'Eliminar' de la clase PagosModel para eliminar un pago de la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;
}
?>