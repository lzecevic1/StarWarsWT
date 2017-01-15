<?php
session_start();
    if(isset($_POST['usermail']) && isset($_POST['password']))
    {   
        $email = $_POST['usermail'];
        $password = md5($_POST['password']);

        // $veza = new PDO("mysql:dbname=starwarsdb;host=localhost;charset=utf8", "swuser", "swpass");
        $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=starwarsdb', 'swuser', 'swpass');
        $veza->exec("set names utf8");
        //   $veza = new PDO("mysql:dbname=starwarsdb;host=mysql-57-centos7", "swuser", "swpass");


        /* PROVJERA DA LI KORISNIK POSTOJI U BAZI */
        $korisnik = $veza->prepare("select * from osoba where email=? and password=?");
        $korisnik->execute(array($email, $password));
        
        $result = $korisnik->fetch(PDO::FETCH_ASSOC);

        if($result != false)
        {
            $uloga = $result['uloga'];
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