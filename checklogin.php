<?php
session_start();
    if(isset($_POST['usermail']) && isset($_POST['password']))
    {   
        $email = $_POST['usermail'];
        $password = $_POST['password'];

        $xml = simplexml_load_file('users.xml');
        $bioUser = false;
        foreach($xml->children() as $value)
        {
            if($value->Email == $email && $value->Password == $password){
                if($value->Uloga == "admin") $_SESSION['user'] = "admin";
                else $_SESSION['user'] = "guest";
                $bioUser = true;
                break;
            }
        }
        if($bioUser) header('Location: index.php');

        if(!$bioUser){
            header('Location: login.php');
            $_SESSION['user'] = "unknown";   
        }
    }
?>