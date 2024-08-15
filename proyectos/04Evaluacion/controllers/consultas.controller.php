<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de consultas

require_once('../models/consultas.model.php');
error_reporting(0); //TODO: DESHABILITAR ERROR, DEJAR COMENTADO Si se desea que se muestre el error
$consultas = new Consultas;
//TODO: operaciones de consultas

switch ($_GET["op"]) {
    case 'todos': //TODO: Procedimiento para cargar todos los datos de las consultas
        $datos = array();
        $datos = $consultas->todos();
        $todos = array();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    case 'uno': //TODO: Procedimiento para obtener una consulta específica
        $consulta_id = $_POST["consulta_id"];
        
        $datos = array();
        $datos = $consultas->uno($consulta_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar': //TODO: Procedimiento para insertar una consulta
        $cita_id = $_POST["cita_id"];
        $diagnostico = $_POST["diagnostico"];
        $tratamiento = $_POST["tratamiento"];
        $fecha_consulta = $_POST["fecha_consulta"];
        
        $datos = array();
        $datos = $consultas->insertar($cita_id, $diagnostico, $tratamiento, $fecha_consulta);
        echo json_encode($datos);
        break;

    case 'actualizar': //TODO: Procedimiento para actualizar una consulta
        $consulta_id = $_POST["consulta_id"];
        $cita_id = $_POST["cita_id"];
        $diagnostico = $_POST["diagnostico"];
        $tratamiento = $_POST["tratamiento"];
        $fecha_consulta = $_POST["fecha_consulta"];
        
        $datos = array();
        $datos = $consultas->actualizar($consulta_id, $cita_id, $diagnostico, $tratamiento, $fecha_consulta);
        echo json_encode($datos);
        break;

    case 'eliminar': //TODO: Procedimiento para eliminar una consulta
        $consulta_id = $_POST["consulta_id"];
        $datos = array();
        $datos = $consultas->eliminar($consulta_id);
        echo json_encode($datos);
        break;
}
?>
