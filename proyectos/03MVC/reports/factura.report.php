<?php
require('fpdf/fpdf.php');
require_once("../models/factura.model.php");

//TODO:  Crear nueva instancia de FPDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

// Reducir márgenes
$pdf->SetMargins(10, 10, 10);


//TODO:  Crear instancia del modelo de Factura
$facturaModel = new Factura();
$idFactura = $_GET['idFactura'];  //TODO:  Recibir el ID de la factura desde el request
$factura = $facturaModel->unoFacDet($idFactura);

//TODO:  Función para truncar texto para el nombre del producto u otro que se requiera
function truncarTexto($texto, $maxLongitud) {
    return (strlen($texto) > $maxLongitud) ? substr($texto, 0, $maxLongitud) . '...' : $texto;
}

//TODO:  Logo para el encabezado de la factura
$pdf->Image('../public/images/saeta.png', 10, 10, 30); //TODO:  Logo de la empresa
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(190, 8, 'EMPRESA XYZ S.A.', 0, 1, 'C');  //TODO:  Nombre de la empresa

//TODO:  Información de la empresa
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(190, 5, 'Dir. Matriz: AV. PRINCIPAL 123 y LA QUE CRUZA', 0, 1, 'C');
$pdf->Cell(190, 5, 'Dir. Matriz: AV. PRINCIPAL 123 y LA QUE CRUZA', 0, 1, 'C');
$pdf->Cell(190, 5, 'Contribuyente Especial Nro: 1234', 0, 1, 'C');
$pdf->Cell(190, 5, 'OBLIGADO A LLEVAR CONTABILIDAD: SI', 0, 1, 'C');
$pdf->Cell(190, 5, 'RUC: 1234567890001', 0, 1, 'C');


//TODO:  Obtener datos de la factura y cliente
if ($factura && mysqli_num_rows($factura) > 0) {
    //TODO:  Extraer el primer registro (cabecera de la factura)
    $datosFactura = mysqli_fetch_assoc($factura);

//TODO:  Número de factura y autorización
$pdf->Ln(3);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 5, 'Factura No.: 001-001-' . $idFactura, 0, 1, 'L');
$pdf->Cell(0, 5, 'Numero de Autorizacion: 0000000000000000000000000000000000000000000000000', 0, 1, 'L');
$pdf->Cell(0, 5, 'Fecha y Hora de Autorizacion: ' . $datosFactura['Fecha'], 0, 1, 'L');
$pdf->Cell(0, 5, 'Ambiente: PRODUCCION', 0, 1, 'L');
$pdf->Cell(0, 5, 'Emision: NORMAL', 0, 1, 'L');
$pdf->Cell(0, 5, 'Clave de Acceso: 0000000000000000000000000000000000000000000000000', 0, 1, 'L');

//TODO:  Información del cliente
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 5, 'Razon Social / Nombres: ' .  $datosFactura['Nombres'], 0, 1, 'L');
$pdf->Cell(0, 5, 'Identificacion: ' .$datosFactura['Cedula'], 0, 1, 'L');
$pdf->Cell(0, 5, 'Fecha de Emision: ' .$datosFactura['Fecha'], 0, 1, 'L');
$pdf->Cell(0, 5, 'Direccion: ' . $datosFactura['Direccion'] , 0, 1, 'L');
$pdf->Cell(0, 5, 'Telefono: ' . $datosFactura['Telefono'] , 0, 1, 'L');
$pdf->Cell(0, 5, 'Correo: ' . $datosFactura['Correo'] , 0, 1, 'L');


//TODO:  Detalles de la factura
$pdf->Ln(3);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 7, 'Sec.', 1);  //TODO:  Columna de secuencial
$pdf->Cell(25, 7, 'idProducto', 1); //TODO:  Columna de idProducto
$pdf->Cell(55, 7, 'Descripcion', 1); //TODO:  Columna de Descripción del producto
$pdf->Cell(15, 7, 'Cant.', 1); //TODO:  Columna de la cantidad del producto en el detalle de la factura
$pdf->Cell(30, 7, 'Precio Unit.', 1); //TODO:  Columna de precio unitario en el detalle de la factura
$pdf->Cell(20, 7, '% IVA', 1); //TODO:  Columna de % de IVA en el detalle de la factura
$pdf->Cell(30, 7, 'Total', 1); //TODO:  Columna de Total del total del detalle de la factura
$pdf->Ln();

$pdf->SetFont('Arial', '', 10);
$index = 1;
mysqli_data_seek($factura, 0);  //TODO:  Reseteamos el puntero de la consulta para recorrer todos los registros de detalle

while ($prod = mysqli_fetch_assoc($factura)) {
    $pdf->Cell(10, 7, $index, 1);  //TODO:  Columna secuencial
    $pdf->Cell(25, 7, number_format($prod['idProductos'], 2), 1); //TODO:  Columna de idProducto
    $pdf->Cell(55, 7, truncarTexto($prod['Nombre_Producto'],30), 1);  //TODO:  Columna de Descripción del producto
    $pdf->Cell(15, 7, $prod['Cantidad'], 1);  //TODO:  Columna de la cantidad del producto en el detalle de la factura
    $pdf->Cell(30, 7, '$' . number_format($prod['Precio_Unitario_d'], 2) , 1);  //TODO:  Columna de precio unitario en el detalle de la factura
    $pdf->Cell(20, 7, number_format($prod['Porcentaje_iva'], 0).'%', 1); //TODO:  Columna de % de IVA en el detalle de la factura
    $pdf->Cell(30, 7, '$' . number_format($prod['Sub_Total_item_d'], 2), 1); //TODO:  Columna de Total del total del detalle de la factura
    $pdf->Ln();
    $index++;
}

//TODO:  Información adicional y resumen de la factura
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(190, 6, 'Forma de Pago: OTROS CON UTILIZACION DEL SISTEMA FINANCIERO', 0, 1);
$pdf->Cell(190, 6, 'Ciudad: IBARRA', 0, 1);

//TODO:  Resumen de impuestos y totales
$pdf->Ln(3);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(130, 6, '', 0);  //TODO:  Columna vacía
$pdf->Cell(30, 6, 'Subtotal 15%:', 0);  //TODO:  Columna de subtotal antes de IVA
$pdf->Cell(30, 6, number_format($datosFactura['Sub_total_f'], 2), 0, 1, 'R');

$pdf->Cell(130, 6, '', 0);
$pdf->Cell(30, 6, 'IVA 15%:', 0); //TODO:  Columna de Valor de IVA
$pdf->Cell(30, 6, number_format($datosFactura['Valor_IVA_f'], 2), 0, 1, 'R');

$pdf->Cell(130, 6, '', 0);
$pdf->Cell(30, 6, 'Total:', 0); //TODO:  Columna de Total de la Factura
$pdf->Cell(30, 6, number_format($datosFactura['Sub_total_iva_f'], 2), 0, 1, 'R');



} else {
    //TODO:  Si la factura no existe, mostrar un mensaje de error en el PDF
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Factura no encontrada', 0, 1, 'C');
}


//TODO:  Imprimir pie de página
//$pdf->SetY(-15);
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 10, 'Pagina ' . $pdf->PageNo(), 0, 0, 'R');

//TODO:  Salida del PDF
$pdf->Output();
