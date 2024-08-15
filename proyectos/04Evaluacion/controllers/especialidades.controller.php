<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de especialidades

require_once('../models/especialidades.model.php');
error_reporting(0);//TODOS: DESHABILITAR ERRORR,  DEJAR COMENTADO Si se desea que se muestre el error
$especialidades = new Especialidades;

switch ($_GET["op"]) {
        //TODO: operaciones de especialidades

    case 'todos': //TODO: Procedimeinto para cargar todos las datos de los especialidades
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase especialidades.model.php
        $datos = $especialidades->todos(); // Llamo al metodo todos de la clase especialidades.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $especialidad_id = $_POST["especialidad_id"];
        
        $datos = array();
        $datos = $especialidades->uno($especialidad_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        
        //TODO: Procedimeinto para insertar un paciente en la base de datos
    case 'insertar':
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
            
        $datos = array();
        $datos = $especialidades->insertar($nombre, $descripcion);
        echo json_encode($datos);
        break;

        //TODO: Procedimeinto para actualziar un paciente en la base de datos
    case 'actualizar':
        $especialidad_id = $_POST["especialidad_id"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        
        $datos = array();
        $datos = $especialidades->actualizar($especialidad_id, $nombre, $descripcion);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un paciente en la base de datos
    case 'eliminar':
        $especialidad_id = $_POST["especialidad_id"];
        $datos = array();
        $datos = $especialidades->eliminar($especialidad_id);
        echo json_encode($datos);
        break;
}