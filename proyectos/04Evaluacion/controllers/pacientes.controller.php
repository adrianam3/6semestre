<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de pacientes

require_once('../models/pacientes.model.php');
error_reporting(0);//TODOS: DESHABILITAR ERRORR,  DEJAR COMENTADO Si se desea que se muestre el error
$pacientes = new Pacientes;

switch ($_GET["op"]) {
        //TODO: operaciones de pacientes

    case 'todos': //TODO: Procedimeinto para cargar todos las datos de los pacientes
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase pacientes.model.php
        $datos = $pacientes->todos(); // Llamo al metodo todos de la clase pacientes.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $paciente_id = $_POST["paciente_id"];
        
        $datos = array();
        $datos = $pacientes->uno($paciente_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimeinto para insertar un paciente en la base de datos
    case 'insertar':
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        
        $datos = array();
        $datos = $pacientes->insertar($nombre, $apellido, $direccion, $telefono);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para actualziar un paciente en la base de datos
    case 'actualizar':
        $paciente_id = $_POST["paciente_id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        
        $datos = array();
        $datos = $pacientes->actualizar($paciente_id, $nombre, $apellido, $direccion, $telefono);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un paciente en la base de datos
    case 'eliminar':
        $paciente_id = $_POST["paciente_id"];
        $datos = array();
        $datos = $pacientes->eliminar($paciente_id);
        echo json_encode($datos);
        break;
}