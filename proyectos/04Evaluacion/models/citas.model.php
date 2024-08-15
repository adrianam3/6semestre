<?php
//TODO: Clase de Citas
require_once('../config/config.php');
class Citas
{
    //TODO: Implementar los métodos de la clase

    public function todos() //select * from citas
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `citas`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($cita_id) //select * from citas where cita_id = $cita_id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `citas` WHERE `cita_id`=$cita_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($paciente_id, $medico_id, $fecha_cita, $motivo) //INSERT INTO `citas`(`paciente_id`, `medico_id`, `fecha_cita`, `motivo`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `citas` (`paciente_id`, `medico_id`, `fecha_cita`, `motivo`) VALUES ('$paciente_id', '$medico_id', '$fecha_cita', '$motivo')";
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

    public function actualizar($cita_id, $paciente_id, $medico_id, $fecha_cita, $motivo) //UPDATE `citas` SET `paciente_id`='$paciente_id', `medico_id`='$medico_id', `fecha_cita`='$fecha_cita', `motivo`='$motivo' WHERE cita_id=$cita_id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `citas` SET `paciente_id`='$paciente_id', `medico_id`='$medico_id', `fecha_cita`='$fecha_cita', `motivo`='$motivo' WHERE `cita_id` = $cita_id";
            if (mysqli_query($con, $cadena)) {
                return $cita_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($cita_id) //delete from citas where cita_id = $cita_id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `citas` WHERE `cita_id`= $cita_id";
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
?>
