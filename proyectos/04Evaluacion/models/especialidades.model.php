<?php
//TODO: Clase de Especialidades
require_once('../config/config.php');
class Especialidades
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from especialidades
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `especialidades`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($especialidad_id) //select * from especialidades where especialidad_id = $especialidad_id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `especialidades` WHERE `especialidad_id`=$especialidad_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombre, $descripcion) //INSERT INTO `especialidades`(`especialidad_id`, `nombre`, `descripcion`) VALUES ('[value-1]','[value-2]','[value-3]')
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `especialidades` (`nombre`, `descripcion`) VALUES ('$nombre', '$descripcion')";
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
    public function actualizar($especialidad_id, $nombre, $descripcion) //UPDATE `especialidades` SET `paciente_id`='[value-1]',`nombre`='[value-2]',`apellido`='[value-3]',`direccion`='[value-4]',`telefono`='[value-5]' WHERE paciente_id=$paciente_id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `especialidades` SET `nombre`='$nombre',`descripcion`='$descripcion' = $especialidad_id";
            if (mysqli_query($con, $cadena)) {
                return $especialidad_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($especialidad_id) //delete from especialidades where especialidad_id = $especialidad_id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `especialidades` WHERE `especialidad_id`= $especialidad_id";
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