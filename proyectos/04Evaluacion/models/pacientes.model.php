<?php
//TODO: Clase de Pacientes
require_once('../config/config.php');
class Pacientes
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from pacientes
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `pacientes`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($paciente_id) //select * from pacientes where paciente_id = $paciente_id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `pacientes` WHERE `paciente_id`=$paciente_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombre, $apellido, $direccion, $telefono) //INSERT INTO `pacientes`(`paciente_id`, `nombre`, `apellido`, `direccion`, `telefono`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `pacientes` (  `nombre`, `apellido`, `direccion`, `telefono`) VALUES ('$nombre', '$apellido', '$direccion', '$telefono')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($paciente_id, $nombre, $apellido, $direccion, $telefono) //UPDATE `pacientes` SET `paciente_id`='[value-1]',`nombre`='[value-2]',`apellido`='[value-3]',`direccion`='[value-4]',`telefono`='[value-5]' WHERE paciente_id=$paciente_id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `pacientes` SET `nombre`='$nombre',`apellido`='$apellido',`direccion`='$direccion',`telefono`='$telefono' WHERE `paciente_id` = $paciente_id";
            if (mysqli_query($con, $cadena)) {
                return $paciente_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($paciente_id) //delete from pacientes where paciente_id = $paciente_id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `pacientes` WHERE `paciente_id`= $paciente_id";
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}