  <?php
    session_start();
    $xml = new DOMDocument();
    $xml->load('itemsShop.xml');

    if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description']))
    {
        $rootTag = $xml->getElementsByTagName("ShopItem")->item(0);

        $dataTag = $xml->createElement("Item");

        $imeTag = $xml->createElement("Ime");
        $imeTag->appendChild($xml->createTextNode($_REQUEST['name']));

        $priceTag = $xml->createElement("Cijena");
        $priceTag->appendChild($xml->createTextNode($_REQUEST['price']));

        $dscTag = $xml->createElement("Opis");
        $dscTag->appendChild($xml->createTextNode($_REQUEST['description']));
            
        $dataTag->appendChild($imeTag);
        $dataTag->appendChild($priceTag);
        $dataTag->appendChild($dscTag);

        $rootTag->appendChild($dataTag);
        $xml->save('itemsShop.xml');
        header('Location:'.$_SERVER['PHP_SELF']);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <META http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
     <body class="forme">
        <div class="header-standard">
        <img id="menicon" src="./images/menu-icon.png" data-toggle="dropdown" onclick="showMenu()">
            <ul id="meni">
                <li><a id="home-link" href="index.php">Star Wars Details</a></li>                
                <li><a href="planets.html">Planets</a></li>
                <li><a href="jedi.html">Jedi</a></li>             
                <li><a href="siths.html">Siths</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="about.html">About us</a></li>
                <li><a href="contact.html">Contact</a></li>    
                <li><a href="login.html">Log in</a></li>  
                <li><a href="register.html">Sign up</a></li>                                            
            </ul>
        </div>
            <div class="">
                <form id = "formaAddShop" action="addShop.php" method="post">
                    <ul>
                        <li> 
                            <input type="text" name="name" placeholder="Ime" required>
                        </li>
                        <li> 
                            <input type="text" name="price" placeholder="Cijena" required>
                        </li>
                        <li> 
                         <textarea placeholder="Opis" name="description" required></textarea><br />
                        </li>

                        <!--<p id="warningMessage"> </p>-->
                        <li id="submit-button-li">
                            <input id="submit-button" type="submit" value="Dodaj">
                        </li>

                    </ul>
                </form>
            </div>
            <script src="script/skripta.js" type="text/javascript"></script>
     </body>
</html>