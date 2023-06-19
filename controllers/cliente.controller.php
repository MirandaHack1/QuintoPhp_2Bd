<?php
// Se incluye el archivo externo que contiene la definición de la clase cliente.
require_once('../models/cliente.model.php');

// Desactiva la visualización de mensajes de error o advertencia.
error_reporting(0);

// Se crea una instancia de la clase cliente.
$Clientes = new cliente;

switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $Clientes->todos();  // Se llama al método 'todos' de la clase cliente para obtener todos los clientes.
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;  // Se guarda cada fila de resultados en un array llamado $todos.
        }
        echo json_encode($todos);  // Se convierte el array $todos a formato JSON y se imprime en pantalla.
        break;

    case 'uno':
        $codigo_cliente = $_POST['codigo_cliente'];  // Se obtiene el código del cliente de la variable POST.
        $datos = array();
        $datos = $codigo_cliente->uno($codigo_cliente);  // Se llama al método 'uno' de la clase cliente para obtener los datos de un cliente específico.
        $respuesta = mysqli_fetch_assoc($datos);
        echo json_encode($respuesta);  // Se convierte $respuesta a formato JSON y se imprime en pantalla.
        break;

    case 'insertar':
        $nombre_cliente = $_POST['nombre_cliente'];  // Se obtienen los datos del nuevo cliente de las variables POST.
        $nombre_contacto = $_POST['nombre_contacto'];
        $apellido_contacto = $_POST['apellido_contacto'];
        $telefono = $_POST['telefono'];
        $fax = $_POST['fax'];
        $linea_direccion1 = $_POST['linea_direccion1'];
        $linea_direccion2 = $_POST['linea_direccion2'];
        $ciudad = $_POST['ciudad'];
        $region = $_POST['region'];
        $pais = $_POST['pais'];
        $codigo_postal = $_POST['codigo_postal'];
        $codigo_empleado_rep_ventas  = $_POST['codigo_empleado_rep_ventas '];
        $limite_credito = $_POST['limite_credito'];
        $datos = array();
        $datos = $Clientes->Insertar($nombre_cliente, $nombre_contacto, $apellido_contacto, $telefono, $fax, $linea_direccion1, $linea_direccion2, $ciudad, $region, $pais, $codigo_postal, $codigo_empleado_rep_venta, $limite_credito);  // Se llama al método 'Insertar' de la clase cliente para agregar un nuevo cliente a la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;
        
    case 'actualizar':
        $codigo_cliente = $_POST['codigo_cliente'];  // Se obtiene el código del cliente a actualizar de la variable POST.
        $nombre_cliente = $_POST['nombre_cliente'];  // Se obtienen los datos actualizados del cliente de las variables POST.
        $nombre_contacto = $_POST['nombre_contacto'];
        $apellido_contacto = $_POST['apellido_contacto'];
        $telefono = $_POST['telefono'];
        $fax = $_POST['fax'];
        $linea_direccion1 = $_POST['linea_direccion1'];
        $linea_direccion2 = $_POST['linea_direccion2'];
        $ciudad = $_POST['ciudad'];
        $region = $_POST['region'];
        $pais = $_POST['pais'];
        $codigo_postal = $_POST['codigo_postal'];
        $codigo_empleado_rep_ventas  = $_POST['codigo_empleado_rep_ventas '];
        $limite_credito = $_POST['limite_credito'];
        $datos = array();
        $datos = $Clientes->Actualizar($codigo_cliente,$nombre_cliente, $nombre_contacto, $apellido_contacto, $telefono, $fax, $linea_direccion1, $linea_direccion2, $ciudad, $region, $pais, $codigo_postal, $codigo_empleado_rep_venta, $limite_credito);  // Se llama al método 'Actualizar' de la clase cliente para actualizar los datos de un cliente en la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;

    case 'eliminar':
        $codigo_cliente = $_POST['codigo_cliente'];  // Se obtiene el código del cliente a eliminar de la variable POST.
        $datos = array();
        $datos = $Clientes->Eliminar($codigo_cliente);  // Se llama al método 'Eliminar' de la clase cliente para eliminar un cliente de la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;
}
?>
