<?php
//TODO: Clase de Consultas
require_once('../config/config.php');
class Consultas
{
    //TODO: Implementar los métodos de la clase

    public function todos() //select * from consultas
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `consultas`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($consulta_id) //select * from consultas where consulta_id = $consulta_id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `consultas` WHERE `consulta_id`=$consulta_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($cita_id, $diagnostico, $tratamiento, $fecha_consulta) //INSERT INTO `consultas`(`consulta_id`, `cita_id`, `diagnostico`, `tratamiento`, `fecha_consulta`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `consultas` (`cita_id`, `diagnostico`, `tratamiento`, `fecha_consulta`) VALUES ('$cita_id', '$diagnostico', '$tratamiento', '$fecha_consulta')";
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

    public function actualizar($consulta_id, $cita_id, $diagnostico, $tratamiento, $fecha_consulta) //UPDATE `consultas` SET `consulta_id`='[value-1]',`cita_id`='[value-2]',`diagnostico`='[value-3]',`tratamiento`='[value-4]',`fecha_consulta`='[value-5]' WHERE consulta_id=$consulta_id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `consultas` SET `cita_id`='$cita_id', `diagnostico`='$diagnostico', `tratamiento`='$tratamiento', `fecha_consulta`='$fecha_consulta' WHERE `consulta_id` = $consulta_id";
            if (mysqli_query($con, $cadena)) {
                return $consulta_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($consulta_id) //delete from consultas where consulta_id = $consulta_id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `consultas` WHERE `consulta_id`= $consulta_id";
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
