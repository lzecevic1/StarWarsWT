<?php

    // $veza = new PDO("mysql:dbname=starwarsdb;host=localhost;charset=utf8", "swuser", "swpass");
    $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=starwarsdb', 'swuser', 'swpass');
    // $veza = new PDO("mysql:dbname=starwarsdb;host=mysql-57-centos7", "swuser", "swpass");

    
    /* PREBACIVANJE KORISNIKA U BAZU */
    if(isset($_REQUEST['korisniciUBazu']))
    {
        // Posto u XML-u nismo drzali id osobe, sada pretragu da li osoba postoji u bazi ne mozemo izvrsiti na osnovu id-a, vec cemo izvrsiti na osnovu svih ostalih polja
        $xml = simplexml_load_file('users.xml'); 
        foreach($xml->children() as $value)
        {
            $ime = $value->Ime;
            $prezime = $value->Prezime;
            $email = $value->Email;
            $password = md5($value->Password);
            $uloga = $value->Uloga;

            $provjera = $veza->prepare("SELECT COUNT(*) FROM Osoba WHERE ime=? and prezime=? and email=?");
            $provjera->bindValue(1, (htmlspecialchars($ime, ENT_QUOTES, "UTF-8")), PDO::PARAM_STR);
            $provjera->bindValue(2, (htmlspecialchars($prezime, ENT_QUOTES, "UTF-8")), PDO::PARAM_STR);
            $provjera->bindValue(3, (htmlspecialchars($email, ENT_QUOTES, "UTF-8")), PDO::PARAM_STR);
            $provjera->execute();
            $broj = $provjera->fetchColumn();
            
            if($broj == 0)
            {
                $upit = $veza->prepare('INSERT INTO Osoba (id, ime, prezime, email, password, uloga) 
                    VALUES (NULL, ?, ?, ?, ?, ?)');
                $upit->bindValue(1, htmlspecialchars($ime, ENT_QUOTES, "UTF-8"), PDO::PARAM_STR);
                $upit->bindValue(2, htmlspecialchars($prezime, ENT_QUOTES, "UTF-8"), PDO::PARAM_STR); 
                $upit->bindValue(3, htmlspecialchars($email, ENT_QUOTES, "UTF-8"), PDO::PARAM_STR);
                $upit->bindValue(4, $password, PDO::PARAM_STR);
                $upit->bindValue(5, $uloga, PDO::PARAM_STR);
                $upit->execute();
            }
        }
    }
    
    /* PREBACIVANJE POSLOVNICA U BAZU */
    if(isset($_REQUEST['poslovniceUBazu']))
    {
        $xml = simplexml_load_file('poslovnice.xml'); 
        foreach($xml->children() as $value)
        {
            $adresa = $value->Adresa;
            $telefon = $value->BrojTelefona;
            $sef = $value->Sef;

            $provjera = $veza->prepare("SELECT COUNT(*) FROM Poslovnica WHERE adresa=?");
            $provjera->bindValue(1, (htmlspecialchars($adresa, ENT_QUOTES, "UTF-8")), PDO::PARAM_STR);
            $provjera->execute();
            $broj = $provjera->fetchColumn();
            
            if($broj == 0)
            {
                $upit = $veza->prepare('INSERT INTO Poslovnica (id, adresa, telefon, sef) 
                VALUES (NULL, ?, ?, ?)');
                $upit->bindValue(1, (htmlspecialchars($adresa, ENT_QUOTES, "UTF-8")), PDO::PARAM_STR);
                $upit->bindValue(2, (htmlspecialchars($telefon, ENT_QUOTES, "UTF-8")), PDO::PARAM_STR);
                $upit->bindValue(3, (htmlspecialchars($sef, ENT_QUOTES, "UTF-8")), PDO::PARAM_INT);
                $upit->execute();
            }
        }
    }

    header('Location: about.php');
?>