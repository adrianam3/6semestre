<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {
    die();
}
//TODO: controlador de medicos

require_once('../models/medicos.model.php');
error_reporting(0); //DESHABILITAR ERRORR,  DEJAR COMENTADO Si se desea que se muestre el error
$medicos = new Medicos;

switch ($_GET["op"]) {
        //TODO: operaciones de medicos

    case 'todos': //TODO: Procedimeinto para cargar todos las datos de los medicos
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase medicos.model.php
        $datos = $medicos->todos(); // Llamo al metodo todos de la clase medicos.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $medico_id = $_POST["medico_id"];

        $datos = array();
        $datos = $medicos->uno($medico_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimeinto para insertar un medico en la base de datos
    case 'insertar':
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $especialidad_id = $_POST["especialidad_id"];
        $telefono = $_POST["telefono"];
        $email = $_POST["email"];

        $datos = array();
        $datos = $medicos->insertar($nombre, $apellido, $especialidad_id, $telefono, $email) ;
        echo json_encode($datos);
        break;

        //TODO: Procedimeinto para actualziar un medico en la base de datos
    case 'actualizar':
        $medico_id = $_POST["medico_id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $especialidad_id = $_POST["especialidad_id"];
        $telefono = $_POST["telefono"];
        $email = $_POST["email"];

        $datos = array();
        $datos = $medicos->actualizar($medico_id, $nombre, $apellido, $especialidad_id, $telefono, $email);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un medico en la base de datos

    case 'eliminar':
        $medico_id = $_POST["medico_id"];
        $datos = array();
        $datos = $medicos->eliminar($medico_id);
        echo json_encode($datos);
        break;
}