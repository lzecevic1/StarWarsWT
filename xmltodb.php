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

            $provjera = $veza->prepare("select count(*) FROM Osoba WHERE ime=? and prezime=? and email=?");
            $provjera->execute(array($ime, $prezime, $email));
            $broj = $provjera->fetchColumn();
            
            if($broj == 0)
            {
                $upit = $veza->prepare('insert into osoba (id, ime, prezime, email, password, uloga) 
                    VALUES (NULL, ?, ?, ?, ?, ?)');
                $upit->execute(array($ime, $prezime, $email, $password, $uloga));
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

            $provjera = $veza->prepare("select count(*) FROM Poslovnica WHERE adresa=:Adresa");
            $provjera->bindValue(":Adresa", $adresa, PDO::PARAM_STR);
            $provjera->execute();
            $broj = $provjera->fetchColumn();
            
            if($broj == 0)
            {
                $upit = $veza->prepare('insert into poslovnica (id, adresa, telefon, sef) 
                VALUES (NULL, ?, ?, ?)');
                $upit->execute(array($adresa, $telefon, $sef));
            }
        }
    }

    header('Location: about.php');
?>