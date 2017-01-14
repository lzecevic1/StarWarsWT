<?php
    
    if (file_exists('poslovnice.xml'))  
    {
        $xml = simplexml_load_file('poslovnice.xml'); 
        $x = 1;
        $v = [];

        $header = array('Adresa poslovnice', 'Broj telefona', 'Ime sefa', 'Prezime sefa');

        // Postavljanje imena kolona u .csv file
        $csvFile = fopen('poslovnice.csv', 'w');
        fputcsv($csvFile, $header);      
        fclose($csvFile);

        $veza = new PDO("mysql:dbname=starwarsdb;host=localhost;charset=utf8", "swuser", "swpass");
        $query = $veza->query("select p.adresa, p.telefon, i.ime, i.prezime from poslovnica p, osoba i where i.id = p.sef");
        $result = $query->fetchAll((PDO::FETCH_ASSOC));

        foreach ($result as $r) 
        {           
            // Upisivanje vrijednosti za 1 red
            $csvFile = fopen('poslovnice.csv', 'a');
            fputcsv($csvFile, $r);      
            fclose($csvFile);  
        }

        $contenttype = "application/force-download";
        header("Content-Type: " . $contenttype);
        header("Content-Disposition: attachment; filename=\"" . basename('poslovnice.csv') . "\";");
        readfile('poslovnice.csv');
        exit();
    }
?>