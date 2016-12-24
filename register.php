  <?php
    session_start();
    $xml = new DOMDocument();
    $xml->load('users.xml');

    if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password']))
    {
        $_SESSION['user'] = $_POST;
        $rootTag = $xml->getElementsByTagName("Korisnici")->item(0);

        $dataTag = $xml->createElement("Podaci");

        $ulogaTag = $xml->createElement("Uloga", "user");

        $imeTag = $xml->createElement("Ime");
        $imeTag->appendChild($xml->createTextNode($_REQUEST['name']));

        $prezimeTag  = $xml->createElement("Prezime");
        $prezimeTag->appendChild($xml->createTextNode($_REQUEST['surname']));

        $emailTag = $xml->createElement("Email");
        $emailTag->appendChild($xml->createTextNode($_REQUEST['email']));

        $pswTag = $xml->createElement("Password");
        $pswTag->appendChild($xml->createTextNode($_REQUEST['password']));
            
        $dataTag->appendChild($ulogaTag);
        $dataTag->appendChild($imeTag);
        $dataTag->appendChild($prezimeTag);
        $dataTag->appendChild($emailTag);
        $dataTag->appendChild($pswTag);

        $rootTag->appendChild($dataTag);
        $xml->save('users.xml');
        header('Location:'.$_SERVER['PHP_SELF']);

    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign Up!</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
     <body class="forme">
    <div class="header-standard">
        <img id="menicon" src="./images/menu-icon.png" data-toggle="dropdown" onclick="showMenu()">
        <div class="header-standard">
        <img id="menicon" src="./images/menu-icon.png" data-toggle="dropdown" onclick="showMenu()">
        <?php if(isset($_POST['usermail']) && isset($_POST['password'])){ ?>
            <ul id="meni">
                <li><a id="home-link" href="index.php">Star Wars Details</a></li>                
                <li><a href="planets.html">Planets</a></li>
                <li><a href="jedi.html">Jedi</a></li>             
                <li><a href="siths.html">Siths</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.php">About us</a></li>
                <li><a href="contact.php">Contact</a></li>    
                <li><a href="logout.php">Log out</a></li>  
            </ul>
        <?php } ?>
        
          <?php  if(!isset($_POST['usermail']) && !isset($_POST['password'])) { ?>        
                <ul id="meni">
                    <li><a id="home-link" href="index.php">Star Wars Details</a></li>                
                    <li><a href="planets.html">Planets</a></li>
                    <li><a href="jedi.html">Jedi</a></li>             
                    <li><a href="siths.html">Siths</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="about.php">About us</a></li>
                    <li><a href="contact.php">Contact</a></li>    
                    <li><a href="login.php">Log in</a></li>  
                    <li><a href="register.php">Sign up</a></li>                                            
                </ul>
        <?php } ?>
        </div>
            <div class="forma-register">
                <form id="register_form" action="register.php" method="post" onsubmit="return validacijaRegistracija()">
                    <ul>
                        <li> 
                            <input id="nameRegister" name="name" type="text" placeholder="Name" required>
                        </li>
                        <li> 
                            <input id="surname" name="surname" type="text" placeholder="Last name" required>
                        </li>
                        <li> 
                            <input id="emailRegister" name="email" type="text" placeholder="Email" required>
                        </li>
                        <li >
                            <input id="password1" name="password" type="password" placeholder="Password" required>
                        </li>
                        <li >
                            <input id="password2" name="repeatpassword" type="password" placeholder="Repeat password" required>
                        </li>
                        <p id="warningMessage"> </p>
                        <li id="submit-button-li">
                            <input id="submit-button" name="register" type="submit" value="Sign up" />
                        </li>
                    </ul>

                </form>
            </div>
         </div>
            <script src="script/skripta.js" type="text/javascript"></script>
     </body>
</html>