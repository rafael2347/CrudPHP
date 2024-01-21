<?php
require_once('TCPDF-main/tcpdf.php');

class MYPDF extends TCPDF {

    public function Header() {
        $image_file = 'images/logo.jpg';
        $this->Image($image_file, 10, 2, 33, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

        $this->SetFont('helvetica', 'B', 12);

        // Empresa information
        $this->Cell(0, 10, 'La Pecera', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(10);

        // More information about the company
        $this->SetFont('helvetica', '', 10);
        $this->Cell(0, 10, 'Datos fiscales: CIF P2189403E', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(5);
        $this->Cell(0, 10, 'Email: lapecera@gmail.com', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(5);
        $this->Cell(0, 10, 'Teléfono: 958384512', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(20); // Aumenté el espacio después del encabezado para evitar superposiciones
    }
<<<<<<< HEAD
=======
    public function Footer() {
        // Posiciona a 15 mm desde la parte inferior
        $this->SetY(-15);
        // Establece la fuente
        $this->SetFont('helvetica', 'I', 8);
        // Agrega el texto del pie de página
        $this->Cell(0, 10, 'Política de privacidad de datos de la empresa', 0, false, 'C');
    }
>>>>>>> 7bf6768 (subida pdf footer)

    public function ColoredTable($header, $data) {
    $this->SetFillColor(46, 204, 113);
    $this->SetTextColor(255);
    $this->SetDrawColor(128, 0, 0);
    $this->SetLineWidth(0.3);
    $this->SetFont('', 'B');

    // Ajusta los anchos de las columnas
    $w = array(20, 30, 40, 40, 25, 39); // Puedes ajustar estos valores según tus necesidades

    $num_headers = count($header);

    // Ajusta la posición Y de la primera celda del encabezado
    $this->SetY(40); // Puedes ajustar este valor según tus necesidades

    for ($i = 0; $i < $num_headers; ++$i) {
        $this->Cell($w[$i], 8, $header[$i], 1, 0, 'C', 1);
    }
    $this->Ln();

    $this->SetFillColor(224, 235, 255);
    $this->SetTextColor(0);
    $this->SetFont('');

    $fill = 0;
    foreach ($data as $row) {
        for ($i = 0; $i < count($header); $i++) {
            // Reduzco el tamaño de fuente si es la columna "email"
            $fontSize = 10;
            if ($i == 5) {//Para la columna del email
                $fontSize = 7;
            }
            
            $this->SetFont('', '', $fontSize);

            $this->Cell($w[$i], 8, $row[$header[$i]], 'LR', 0, 'L', $fill);
        }
        $this->Ln();
        $fill = !$fill;
    }
    $this->Cell(array_sum($w), 0, '', 'T');
}




}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('La pecera');
$pdf->SetTitle('Listado de clientes');
$pdf->SetSubject('Lista Clientes');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->AddPage();

$header = array('id', 'nombre', 'apellidos', 'direccion', 'telefono', 'email');

$data = array();

require 'conexion.php';

$sql = "SELECT * FROM crud";
$stmt = $conexion->prepare($sql);
$result = $stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdf->ColoredTable($header, $rows);

$pdf->Output('example_011.pdf', 'I');
?>
