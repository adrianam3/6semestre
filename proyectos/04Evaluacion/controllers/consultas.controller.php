<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {
    die();
}
//TODO: controlador de detalle_factura

require_once('../models/detalleFactura.model.php');
error_reporting(0); //DESHABILITAR ERRORR,  DEJAR COMENTADO Si se desea que se muestre el error
$detalleFactura = new DetalleFactura;

switch ($_GET["op"]) {
        //TODO: operaciones de detalle_factura

    case 'todos': //TODO: Procedimeinto para cargar todos las datos de los detalle_factura
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase detalleFactura.model.php
        $datos = $detalleFactura->todos(); // Llamo al metodo todos de la clase detalleFactura.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $idDetalle_Factura = $_POST["idDetalle_Factura"];
        $datos = array();
        $datos = $detalleFactura->uno($idDetalle_Factura);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimeinto para insertar un detalle_factura en la base de datos
    case 'insertar':
        $Cantidad = $_POST["Cantidad"];
        $Factura_idFactura = $_POST["Factura_idFactura"];
        $Kardex_idKardex = $_POST["Kardex_idKardex"];
        $Precio_Unitario = $_POST["Precio_Unitario"];
        $Sub_Total_item = $_POST["Sub_Total_item"];

        $datos = array();
        $datos = $detalleFactura->insertar($Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Teleofno_Contacto);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para actualziar un detalle_factura en la base de datos
    case 'actualizar':
        $idDetalle_Factura = $_POST["idDetalle_Factura"];
        $Cantidad = $_POST["Cantidad"];
        $Factura_idFactura = $_POST["Factura_idFactura"];
        $Kardex_idKardex = $_POST["Kardex_idKardex"];
        $Precio_Unitario = $_POST["Precio_Unitario"];
        $Sub_Total_item = $_POST["Sub_Total_item"];

        $datos = array();
        $datos = $detalleFactura->actualizar($idProveedores, $Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Teleofno_Contacto);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un detalle_factura en la base de datos
    case 'eliminar':
        $idDetalle_Factura = $_POST["idDetalle_Factura"];
        $datos = array();
        $datos = $detalleFactura->eliminar($idDetalle_Factura);
        echo json_encode($datos);
        break;
}