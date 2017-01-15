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
        $x = 0; 
        foreach($header as $col){
            $this->SetFont('Times', 'B', 12);
            $this->Cell(41 - $x, 58, $col, 0);
            $x += 9;
            
        }
        $this->Ln();
        // Data
        $this->SetY(45);
        $this->SetFont('Times', '', 12);
        foreach($data as $row)
        {
            $x = 0;
            foreach($row as $col){
                $this->Cell(41 - $x, 8, $col, 0, 0);
                $x += 8;
            }
            $this->Ln();
        }
    }
}


    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times', '', 12);
    $header = array('Adresa poslovnice', 'Broj telefona', 'Ime sefa', 'Prezime sefa');
    // $veza = new PDO("mysql:dbname=starwarsdb;host=localhost;charset=utf8", "swuser", "swpass");
    // $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=starwarsdb', 'swuser', 'swpass');
    $veza = new PDO("mysql:dbname=starwarsdb;host=mysql-57-centos7", "swuser", "swpass");
    $query = $veza->query("select p.adresa, p.telefon, i.ime, i.prezime from poslovnica p, osoba i where i.id = p.sef");
    $result = $query->fetchAll((PDO::FETCH_ASSOC));
    $pdf->BasicTable($header, $result);
    $pdf->SetX(15);
    $pdf->SetY(40);
    $pdf->Output();
?>