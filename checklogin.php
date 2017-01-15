<?php
session_start();
    if(isset($_POST['usermail']) && isset($_POST['password']))
    {   
        $email = $_POST['usermail'];
        $password = md5($_POST['password']);

        // $veza = new PDO("mysql:dbname=starwarsdb;host=localhost;charset=utf8", "swuser", "swpass");
        // $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=starwarsdb', 'swuser', 'swpass');
        $veza = new PDO("mysql:dbname=starwarsdb;host=mysql-57-centos7", "swuser", "swpassword");

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
            else if ($uloga == 'sef') $_SESSION['user'] = "sef";
            header('Location: index.php');
        }

        else
        {
            header('Location: login.php');
            $_SESSION['user'] = "unknown"; 
        }
    }
?>