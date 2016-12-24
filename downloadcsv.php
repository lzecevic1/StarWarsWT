<?php
    
    if (file_exists('poslovnice.xml'))  
    {
        $xml = simplexml_load_file('poslovnice.xml'); 
        $x = 1;
        $v = [];

        $header = array('Adresa poslovnice', 'Broj telefona');

        // Postavljanje imena kolona u .csv file
        $csvFile = fopen('poslovnice.csv', 'w');
        fputcsv($csvFile, $header);      
        fclose($csvFile);

        $result = $xml->xpath('//Podaci'); // The xpath method searches the SimpleXML node for children matching the XPath path.

        foreach ($result as $r) 
        {           
            $child = $xml->xpath('//Podaci['.$x .']/*');      

            foreach ($child as $value) {
                $v[] = $value;         
            }

            // Upisivanje vrijednosti za 1 red
            $csvFile = fopen('poslovnice.csv', 'a');
            fputcsv($csvFile, $v);      
            fclose($csvFile);  

            $v = []; // Oslobađanje niza 
            $x++; // Idi na sljedeći <Podaci> tag
        }

        $contenttype = "application/force-download";
        header("Content-Type: " . $contenttype);
        header("Content-Disposition: attachment; filename=\"" . basename('poslovnice.csv') . "\";");
        readfile('poslovnice.csv');
        exit();
    }
?>