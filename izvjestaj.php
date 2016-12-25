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
        $this->Cell(30, 40, 'Poslovnice', 0, 0);
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

    function BasicTable($header, $data)
    {
        // Header
        $this->SetX(10);
        foreach($header as $col){
            $this->SetFont('Times', 'B', 12);
            $this->Cell(40, 58, $col, 0);
        }
        $this->Ln();
        
        // Data
        $this->SetY(45);
        $this->SetFont('Times', '', 12);
        foreach($data as $row)
        {
            foreach($row as $col){
                $this->Cell(41, 8, $col, 0, 0);
            }
            $this->Ln();
        }
    }
}


    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times', '', 12);
    $header = array('Adresa poslovnice', 'Broj telefona', 'Radno vrijeme');
    $xml = simplexml_load_file('poslovnice.xml');
    $pdf->BasicTable($header, $xml);
    $pdf->SetX(15);
    $pdf->SetY(40);
    $pdf->Output();
?>