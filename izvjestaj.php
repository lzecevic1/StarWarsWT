<?php
require('./fpdf181/fpdf.php');


class PDF extends FPDF
{
    function Header()
    {
        //Star Wars logo
        $this->Image('./images/logo.png', 85, 6, 40);

        //Font Times New Roman, veličina 15 i boldirano
        $this->SetFont('Times', 'B', 20);

        // Naslov
        $this->Cell(30, 40, 'Episodes', 0, 0);
    }

    function Footer()
    {
        // Numeracija stranica pozicionirana 1.5cm od dna
        $this->SetY(-15);

        // Times New Roman, veličina 8 i italic 
        $this->SetFont('Times','I', 10);

        // Broj stranice
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
$tekst = file_get_contents('./episodes.txt');
$pdf->SetX(15);
$pdf->SetY(40);
$pdf->MultiCell(0,5,$tekst);
$pdf->Output();
?>