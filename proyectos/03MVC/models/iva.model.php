<?php
//TODO: Clase de iva
require_once('../config/config.php');
class Iva
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from unidad_medida
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `iva`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idIVA) //select * from iva where idIVA = $idIVA
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `iva` WHERE `idIVA`=$idIVA";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($Detalle, $Estado, $Valor) //insert into unidad_medida (idIVA, Detalle, Estado, Valor) values ($idIVA, $Detalle, $Estado, $Valor)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `iva` (  `Detalle`, `Estado`, `Valor` ) VALUES ('$Detalle', '$Valor')";
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
    public function actualizar($idIVA, $Detalle, $Estado, $Valor) //update unidad_medida set Detalle = $Detalle, Estado = $Estado, Valor = $Valor
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `iva` SET `Detalle`='$Detalle',`Estado`='$Estado', `Valor`='$Valor'";
            if (mysqli_query($con, $cadena)) {
                return $idIVA;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idIVA) //delete from unidad_medida where idUnidad_Medida = $idUnidad_Medida
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `iva` WHERE `idIVA`= $idIVA";
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