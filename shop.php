<!DOCTYPE html>
<?php
    session_start();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <META http-equiv="Content-Type" content="text/html; charset=utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Star Wars Details</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="page">
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

        <div class="col-2">          
                <div class="shop-article" id="container">
                    <h2 id="imeArtikla"> Privjesak</h2>
                    <img id="shop-image" class="shop-image" src="images/commander.png" alt="shop-image" onclick="zoomImage()">
                    <p id="opisArtikla">Stormtrooper privjesak za kljuceve, omjer 1:1000</p>
                    <h4 id="cijenaArtikla">Cijena: 7KM</h4>
                      <li id="kupi-button-li">
                            <input id="kupi-button" type="submit" value="Kupi">
                      </li>
                </div>
        </div>
                <div class="col-2">          
                <div class="shop-article">
                    <h2> Privjesak</h2>
                    <img id="shop-image" class="shop-image" src="images/commander.png" alt="shop-image" onclick="zoomImage()">
                    <p>Stormtrooper privjesak za kljuceve, omjer 1:1000</p>
                    <h4>Cijena: 7KM</h4>
                      <li id="kupi-button-li">
                            <input id="kupi-button" type="submit" value="Kupi">
                      </li>
                </div>
        </div>
                <div class="col-2">          
                <div class="shop-article">
                    <h2> Privjesak</h2>
                    <img id="shop-image" class="shop-image" src="images/commander.png" alt="shop-image" onclick="zoomImage()">
                    <p>Stormtrooper privjesak za kljuceve, omjer 1:1000</p>
                    <h4>Cijena: 7KM</h4>
                      <li id="kupi-button-li">
                            <input id="kupi-button" type="submit" value="Kupi">
                      </li>
                </div>
        </div>
        <script src="script/skripta.js" type="text/javascript"></script>
    </body>
</html>