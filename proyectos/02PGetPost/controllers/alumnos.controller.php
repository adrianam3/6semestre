<?php
// error_reporting(0);

require_once("../models/alumnos.models.php");

$alumnos = new Alumnos();
switch($_GET["op"]){
    case 'todos':
        $datos = $alumnos->todos();
        while($row = mysqli_fetch_assoc($datos)){
            $todos[] = $row;
        }
        echo json_encode($todos);
    break;

    case 'uno':
        $idAlumno = $_POST["IdAlumno"];
        $datos = $alumnos->uno($idAlumno);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
    break;

     case 'insertar':
        $nombre = $_POST["Nombre"];
        $apellido = $_POST["Apellido"];
        $edad = $_POST["Edad"];
        $datos = $alumnos->insertar($nombre, $apellido, $edad);
        echo json_encode($datos);
    break;

    case 'actualizar':
        $idAlumno = $_POST["IdAlumno"];
        $nombre = $_POST["Nombre"];
        $apellido = $_POST["Apellido"];
        $edad = $_POST["Edad"];
        $datos = $alumnos->actualizar($idAlumno, $nombre, $apellido, $edad);
        echo json_encode($datos);
    break;
    case 'eliminar':
        $idAlumno = $_POST["IdAlumno"];
        $datos = $alumnos->eliminar($idAlumno);
        echo json_encode($datos);
        echo $datos;
        break;
}

?>