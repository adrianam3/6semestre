<?php
//TODO: Clase de Clientes
require_once('../config/config.php');
class Clientes
{
    //TODO: Implementar los metodos de la clase

    public function buscar($textp) // select * from clientes
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `clientes` where nombres='$textp'";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    
    public function todos() //select * from clientes
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `clientes`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idClientes) //select * from clientes where idClientes = $idClientes
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `clientes` WHERE `idClientes`=$idClientes";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($Nombres, $Direccion, $Telefono, $Cedula, $Correo) //INSERT INTO `clientes`(`idClientes`, `Nombres`, `Direccion`, `Telefono`, `Cedula`, `Correo`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `clientes` (  `Nombres`, `Direccion`, `Telefono`, `Cedula`, `Correo`) VALUES ('$Nombres', '$Direccion', '$Telefono', '$Cedula', '$Correo')";
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
    public function actualizar($idClientes, $Nombres, $Direccion, $Telefono, $Cedula, $Correo) //UPDATE `clientes` SET `idClientes`='[value-1]',`Nombres`='[value-2]',`Direccion`='[value-3]',`Telefono`='[value-4]',`Cedula`='[value-5]',`Correo`='[value-6]' WHERE idClientes=$idClientes
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `clientes` SET `Nombres`='$Nombres',`Direccion`='$Direccion',`Telefono`='$Telefono',`Cedula`='$Cedula',`Correo`='$Correo' WHERE `idClientes` = $idClientes";
            if (mysqli_query($con, $cadena)) {
                return $idClientes;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idClientes) //delete from clientes where idClientes = $idClientes
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `clientes` WHERE `idClientes`= $idClientes";
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