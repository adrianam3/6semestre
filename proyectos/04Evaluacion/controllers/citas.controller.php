<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

//TODO: controlador de citas

require_once('../models/citas.model.php');
error_reporting(0); //TODO: DESHABILITAR ERROR, DEJAR COMENTADO Si se desea que se muestre el error
$citas = new Citas;

switch ($_GET["op"]) {
    case 'todos': //TODO: Procedimiento para cargar todas las citas
        $datos = array();
        $datos = $citas->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    case 'uno': //TODO: Procedimiento para obtener una cita específica
        $cita_id = $_POST["cita_id"];
        $datos = array();
        $datos = $citas->uno($cita_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar': //TODO: Procedimiento para insertar una cita
        $paciente_id = $_POST["paciente_id"];
        $medico_id = $_POST["medico_id"];
        $fecha_cita = $_POST["fecha_cita"];
        $motivo = $_POST["motivo"];
        
        $datos = array();
        $datos = $citas->insertar($paciente_id, $medico_id, $fecha_cita, $motivo);
        echo json_encode($datos);
        break;

    case 'actualizar': //TODO: Procedimiento para actualizar una cita
        $cita_id = $_POST["cita_id"];
        $paciente_id = $_POST["paciente_id"];
        $medico_id = $_POST["medico_id"];
        $fecha_cita = $_POST["fecha_cita"];
        $motivo = $_POST["motivo"];
        
        $datos = array();
        $datos = $citas->actualizar($cita_id, $paciente_id, $medico_id, $fecha_cita, $motivo);
        echo json_encode($datos);
        break;

    case 'eliminar': //TODO: Procedimiento para eliminar una cita
        $cita_id = $_POST["cita_id"];
        $datos = array();
        $datos = $citas->eliminar($cita_id);
        echo json_encode($datos);
        break;
}
?>
