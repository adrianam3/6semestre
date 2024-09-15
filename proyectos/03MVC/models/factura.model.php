<?php
//TODO: Clase de Factura
require_once('../config/config.php');
class Factura
{
    
    public function todos() // select * from factura
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT factura.idFactura, clientes.Nombres, (factura.Sub_total + factura.Sub_total_iva) as total FROM `factura` INNER JOIN clientes on factura.Clientes_idClientes = clientes.idClientes";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    
    public function uno($idFactura) // select * from factura where id = $idFactura
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `factura` INNER JOIN clientes on factura.Clientes_idClientes = clientes.idClientes WHERE `idFactura` = $idFactura";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function unoFacDet($idFactura) // select * from factura where id = $idFactura
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT
                    df.idDetalle_Factura as idDetalle_Factura_d,
                    f.idFactura AS idFactura,
                    f.Fecha AS Fecha,
                    c.Cedula Cedula,
                    c.Nombres AS Nombres,
                    c.Direccion AS Direccion,
                    c.Telefono as Telefono,
                    c.Correo as Correo,
                    f.Sub_total as Sub_total_f,
                    f.Valor_IVA as Valor_IVA_f,
                    f.Sub_total_iva as Sub_total_iva_f,
                    P.idProductos as idProductos,
                    P.Nombre_Producto as Nombre_Producto,
                    
                    df.Cantidad as Cantidad ,
                    df.Precio_Unitario as Precio_Unitario_d,
                    df.Sub_Total_item as Sub_Total_item_d ,
                    i.Valor as Porcentaje_iva
                FROM
                    `factura` f
                JOIN `clientes` c ON
                    c.idClientes = f.Clientes_idClientes
                JOIN `detalle_factura` df ON
                    df.Factura_idFactura = f.idFactura
                JOIN `kardex` k ON
                    k.idKardex = df.Kardex_idKardex
                JOIN `productos` p ON
                    p.idProductos = k.Productos_idProductos
                JOIN `iva` i ON
                    i.idIVA = k.IVA_idIVA
                WHERE
                    f.idFactura = $idFactura AND k.Estado = 1";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    
    //TODO: Implementar los metodos de la clase

    /*public function todos() //select * from factura
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `factura`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idFactura) //select * from factura where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `factura` WHERE `idFactura`=$idFactura";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
        */

    public function insertar($Fecha, $Sub_total, $Sub_total_iva, $Valor_IVA, $Clientes_idClientes) //INSERT INTO `factura`(`idFactura`, `Fecha`, `Sub_total`, `Sub_total_iva`, `Valor_IVA`, `Clientes_idClientes`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `factura` ( `Fecha`, `Sub_total`, `Sub_total_iva`, `Valor_IVA`, `Clientes_idClientes`) VALUES ('$Fecha','$Sub_total','$Sub_total_iva','$Valor_IVA','$Clientes_idClientes')";
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
    public function actualizar($idFactura, $Fecha, $Sub_total, $Sub_total_iva, $Valor_IVA, $Clientes_idClientes) //UPDATE `factura` SET `idFactura`='[value-1]',`Fecha`='[value-2]',`Sub_total`='[value-3]',`Sub_total_iva`='[value-4]',`Valor_IVA`='[value-5]',`Clientes_idClientes`='[value-6]' WHERE 1
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `factura` SET `idFactura`='$idFactura',`Fecha`='$Fecha',`Sub_total`='$Sub_total',`Sub_total_iva`='$Sub_total_iva',`Valor_IVA`='$Valor_IVA',`Clientes_idClientes`='$Clientes_idClientes' WHERE `idFactura` = $idFactura";
            if (mysqli_query($con, $cadena)) {
                return $idFactura;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idFactura) //delete from factura where idFactura = $idFactura
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `factura` WHERE `idFactura`= $idFactura";
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