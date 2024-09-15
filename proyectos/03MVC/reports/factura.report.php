<?php
require('fpdf/fpdf.php');
require_once("../models/factura.model.php");

//TODO:  Crear nueva instancia de FPDF
$pdf = new FPDF();
$pdf->AddPage();

//TODO:  Crear instancia del modelo de Factura
$facturaModel = new Factura();
$idFactura = $_GET['idFactura'];  //TODO:  Asegúrate de recibir el ID de la factura desde el request
$factura = $facturaModel->unoFacDet($idFactura);

//TODO:  Encabezado
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Factura No. ' . $idFactura, 0, 1, 'C');

//TODO:  Obtener datos de la factura y cliente
if ($factura) {
    //TODO:  Extraer el primer registro (cabecera de la factura)
    $datosFactura = mysqli_fetch_assoc($factura);

    //TODO:  Datos del cliente
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Cliente: ' . $datosFactura['Nombres'], 0, 1);
    $pdf->Cell(0, 10, 'Cedula: ' . $datosFactura['Cedula'], 0, 1);
    $pdf->Cell(0, 10, 'Direccion: ' . $datosFactura['Direccion'], 0, 1);
    $pdf->Cell(0, 10, 'Telefono: ' . $datosFactura['Telefono'], 0, 1);
    $pdf->Cell(0, 10, 'Correo: ' . $datosFactura['Correo'], 0, 1);

    //TODO:  Datos de la factura
    $pdf->Cell(0, 10, 'Fecha: ' . $datosFactura['Fecha'], 0, 1);
    $pdf->Cell(0, 10, 'Sub Total: $' . number_format($datosFactura['Sub_total_f'], 2), 0, 1);
    $pdf->Cell(0, 10, 'Valor IVA: $' . number_format($datosFactura['Valor_IVA_f'], 2), 0, 1);
    $pdf->Cell(0, 10, 'Total IVA Incluido: $' . number_format($datosFactura['Sub_total_iva_f'], 2), 0, 1);
    
    $pdf->Ln(10);

    //TODO:  Tabla de productos
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(10, 10, '#', 1);
    $pdf->Cell(55, 10, 'Producto', 1);
    $pdf->Cell(25, 10, 'Cantidad', 1);
    $pdf->Cell(30, 10, 'Precio Unit.', 1);
    $pdf->Cell(30, 10, 'SubTotal', 1);
    $pdf->Ln();

    $index = 1;
    mysqli_data_seek($factura, 0);  //TODO:  Reseteamos el puntero de la consulta para recorrer todos los registros de detalle

    $pdf->SetFont('Arial', '', 12);
    while ($prod = mysqli_fetch_assoc($factura)) {
        $pdf->Cell(10, 10, $index, 1);
        $pdf->Cell(55, 10, $prod['Nombre_Producto'], 1);
        $pdf->Cell(25, 10, $prod['Cantidad'], 1);
        $pdf->Cell(30, 10, '$' . number_format($prod['Precio_Unitario_d'], 2), 1);
        $pdf->Cell(30, 10, '$' . number_format($prod['Sub_Total_item_d'], 2), 1);
        $pdf->Ln();
        $index++;
    }

    //TODO:  Pie de página con el total
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Total a Pagar: $' . number_format($datosFactura['Sub_total_iva_f'], 2), 0, 1, 'R');
    
} else {
    $pdf->Cell(0, 10, 'Factura no encontrada', 0, 1);
}

//TODO:  Imprimir pie de página
$pdf->SetY(-15);
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 10, 'Pagina ' . $pdf->PageNo(), 0, 0, 'C');

//TODO:  Salida del PDF
$pdf->Output();
