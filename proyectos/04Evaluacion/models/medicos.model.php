<?php
//TODO: Clase de Medicos
require_once('../config/config.php');
class Medicos
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from medicos
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `medicos`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($medico_id) //select * from medicos where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `medicos` WHERE `medico_id`=$medico_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombre, $apellido, $especialidad_id, $telefono, $email) //INSERT INTO `medicos`(`medico_id`, `nombre`, `apellido`, `especialidad_id`, `telefono`, `email`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `medicos` ( `nombre`, `apellido`, `especialidad_id`, `telefono`, `email`) VALUES ('$nombre','$apellido','$especialidad_id','$telefono','$email')";
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
    public function actualizar($medico_id, $nombre, $apellido, $especialidad_id, $telefono, $email) //UPDATE `medicos` SET `medico_id`='[value-1]',`nombre`='[value-2]',`apellido`='[value-3]',`especialidad_id`='[value-4]',`telefono`='[value-5]',`email`='[value-6]' WHERE medico_id=$medico_id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `medicos` SET `nombre`='$nombre',`apellido`='$apellido',`especialidad_id`='$especialidad_id',`telefono`='$telefono', `email`='$email' WHERE `medico_id` = $medico_id";
            if (mysqli_query($con, $cadena)) {
                return $medico_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($medico_id) //delete from medicos where medico_id = $medico_id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `medicos` WHERE `medico_id`= $medico_id";
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