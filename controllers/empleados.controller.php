<?php
// Se incluye el archivo externo que contiene la definición de la clase EmpleadoModel.
require_once('../models/empleados.model.php');

// Desactiva la visualización de mensajes de error o advertencia.
error_reporting(0);

// Se crea una instancia de la clase EmpleadoModel.
$Empleado = new EmpleadoModel;

switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $Empleado->todos();  // Se llama al método 'todos' de la clase EmpleadoModel para obtener todos los empleados.
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;  // Se guarda cada fila de resultados en un array llamado $todos.
        }
        echo json_encode($todos);  // Se convierte el array $todos a formato JSON y se imprime en pantalla.
        break;

    case 'uno':
        $codigo_empleado  = $_POST['codigo_empleado '];  // Se obtiene el código de empleado de la variable POST.
        $datos = array();
        $datos = $codigo_empleado->uno($codigo_empleado);  // Se llama al método 'uno' de la clase EmpleadoModel para obtener un empleado específico.
        $respuesta = mysqli_fetch_assoc($datos);  // Se obtiene una fila de resultado y se guarda en $respuesta.
        echo json_encode($respuesta);  // Se convierte $respuesta a formato JSON y se imprime en pantalla.
        break;

    case 'insertar':
        $nombre = $_POST['nombre'];  // Se obtienen los datos del empleado de las variables POST.
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $extension = $_POST['extension'];
        $email = $_POST['email'];
        $codigo_oficina  = $_POST['codigo_oficina '];
        $codigo_jefe  = $_POST['codigo_jefe '];
        $puesto = $_POST['puesto'];
        $datos = array();
        $datos = $Empleado->Insertar($nombre, $apellido1, $apellido2, $extension, $email, $codigo_oficina, $codigo_jefe, $puesto, $region, $pais);  // Se llama al método 'Insertar' de la clase EmpleadoModel para agregar un nuevo empleado a la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;

    case 'actualizar':
        $codigo_empleado  = $_POST['codigo_empleado '];  // Se obtiene el código de empleado de la variable POST.
        $nombre = $_POST['nombre'];  // Se obtienen los datos actualizados del empleado de las variables POST.
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $extension = $_POST['extension'];
        $email = $_POST['email'];
        $codigo_oficina  = $_POST['codigo_oficina '];
        $codigo_jefe  = $_POST['codigo_jefe '];
        $puesto = $_POST['puesto'];
        $datos = array();
        $datos = $Empleado->Actualizar($codigo_empleado, $nombre, $apellido1, $apellido2, $extension, $email, $codigo_oficina, $codigo_jefe, $puesto, $region, $pais);  // Se llama al método 'Actualizar' de la clase EmpleadoModel para actualizar los datos de un empleado existente en la base de datos.
        break;

    case 'eliminar':
        $codigo_empleado  = $_POST['codigo_empleado '];  // Se obtiene el código de empleado de la variable POST.
        $datos = array();
        $datos = $Empleado->Eliminar($codigo_empleado);  // Se llama al método 'Eliminar' de la clase EmpleadoModel para eliminar un empleado de la base de datos.
        echo json_encode($datos);  // Se convierte $datos a formato JSON y se imprime en pantalla.
        break;
}
?>

