<?php
session_start();
    if(isset($_POST['usermail']) && isset($_POST['password']))
    {   
        $email = $_POST['usermail'];
        $password = md5($_POST['password']);

        $veza = new PDO("mysql:dbname=starwarsdb;host=localhost;charset=utf8", "swuser", "swpass");

        /* PROVJERA DA LI KORISNIK POSTOJI U BAZI */
        $korisnik = $veza->prepare('SELECT * FROM Osoba WHERE email=?  and password=?');
        $korisnik->bindValue(1, $email, PDO::PARAM_STR);
        $korisnik->bindValue(2, $password, PDO::PARAM_STR);
        $korisnik->execute();
        
        $array = $korisnik->fetch(PDO::FETCH_ASSOC);

        if($array != false)
        {
            $uloga = $array['uloga'];
            if($uloga == 'admin') $_SESSION['user'] = "admin";
            else if($uloga == 'user') $_SESSION['user'] = "guest";
            header('Location: index.php');
        }

        else
        {
            header('Location: login.php');
            $_SESSION['user'] = "unknown"; 
        }

        // $xml = simplexml_load_file('users.xml');
        // $bioUser = false;
        // foreach($xml->children() as $value)
        // {
        //     if($value->Email == $email && $value->Password == $password){
        //         if($value->Uloga == "admin") $_SESSION['user'] = "admin";
        //         else $_SESSION['user'] = "guest";
        //         $bioUser = true;
        //         break;
        //     }
        // }
        // if($bioUser) header('Location: index.php');

        // if(!$bioUser){
        //     header('Location: login.php');
        //     $_SESSION['user'] = "unknown";   
        // }
    }
?>