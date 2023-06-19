<?php
//TODO: archvios externos
require_once('../models/oficinas.models.php');  // Se incluye el archivo externo que contiene la definición de la clase OficinasModel.

//TODO: Manejo de reportes
error_reporting(0);  // Desactiva la visualización de mensajes de error o advertencia.

//TODO: Importacion de clase oficina
$Oficinas = new OficinasModel;  // Se crea una instancia de la clase OficinasModel.

switch ($_GET['OP']) {  // Se utiliza el valor del parámetro 'OP' pasado a través de la URL para determinar la operación a realizar.

    case 'todos':
        $datos = array();
        $datos = $Oficinas->todos();  // Se llama al método 'todos' de la clase OficinasModel para obtener todas las oficinas.
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;  // Se guarda cada fila de resultados en un array llamado $todos.
        }
        echo json_encode($todos);  // Se convierte el array $todos a formato JSON y se imprime en pantalla.
        break;

    case 'uno':
        $codigo_oficina  = $_POST['codigo_producto '];  // Se obtiene el código de oficina de la variable POST.
        $datos = array();
        $datos = $Oficinas->uno($codigo_oficina);  // Se llama al método 'uno' de la clase OficinasModel para obtener una oficina específica.
        $respuesta = mysqli_fetch_assoc($datos);  // Se obtiene una fila de resultado y se guarda en $respuesta.
        echo json_encode($respuesta);  // Se convierte $respuesta a formato JSON y se imprime en pantalla.
        break;

    case 'insertar':
        $codigo_oficina  = $_POST['codigo_oficina '];  // Se obtienen los datos de la oficina de las variables POST.
        $ciudad = $_POST['ciudad'];
        $pais  = $_POST['pais '];
        $region = $_POST['region'];
        $proveedor = $_POST['proveedor'];
        $codigo_postal = $_POST['codigo_postal'];
        $telefono = $_POST['telefono'];
        $linea_direccion1 = $_POST['linea_direccion1'];
        $linea_direccion2 = $_POST['linea_direccion2'];
        $datos = array();
        $datos = $Oficinas->Insertar($codigo_oficina,$ciudad,$pais,$region,$proveedor,$proveedor, $codigo_postal,$telefono,$linea_direccion1,$linea_direccion2);  // Se llama al método 'Insertar' de la clase OficinasModel para agregar una nueva oficina a la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;

    case 'actulizar':
        $codigo_oficina  = $_POST['codigo_oficina '];  // Se obtienen los datos actualizados de la oficina de las variables POST.
        $ciudad = $_POST['ciudad'];
        $pais  = $_POST['pais '];
        $region = $_POST['region'];
        $proveedor = $_POST['proveedor'];
        $codigo_postal = $_POST['codigo_postal'];
        $telefono = $_POST['telefono'];
        $linea_direccion1 = $_POST['linea_direccion1'];
        $linea_direccion2 = $_POST['linea_direccion2'];
        $datos = array();
        $datos = $Oficinas->Actualizar($codigo_oficina,$ciudad,$pais,$region,$proveedor,$proveedor, $codigo_postal,$telefono,$linea_direccion1,$linea_direccion2);  // Se llama al método 'Actualizar' de la clase OficinasModel para actualizar los datos de una oficina existente en la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;

    case 'eliminar':
        $codigo_oficina  = $_POST['codigo_oficina '];  // Se obtiene el código de oficina de la variable POST.
        $datos = array();
        $datos = $Oficinas->Eliminar($codigo_producto);  // Se llama al método 'Eliminar' de la clase OficinasModel para eliminar una oficina de la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;
}
?>

