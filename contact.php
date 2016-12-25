  <?php
    session_start();
    $xml = new DOMDocument();
    $xml->load('contacts.xml');

    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']))
    {
        $rootTag = $xml->getElementsByTagName("Contacts")->item(0);

        $dataTag = $xml->createElement("Podaci");

        $imeTag = $xml->createElement("Ime");
        $imeTag->appendChild($xml->createTextNode($_REQUEST['name']));

        $emailTag = $xml->createElement("Email");
        $emailTag->appendChild($xml->createTextNode($_REQUEST['email']));

        $msgTag = $xml->createElement("Poruka");
        $msgTag->appendChild($xml->createTextNode($_REQUEST['message']));
            
        $dataTag->appendChild($imeTag);
        $dataTag->appendChild($emailTag);
        $dataTag->appendChild($msgTag);

        $rootTag->appendChild($dataTag);
        $xml->save('contacts.xml');
        header('Location:'.$_SERVER['PHP_SELF']);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
     <body class="forme">
<div class="header-standard">
        <img id="menicon" src="./images/menu-icon.png" data-toggle="dropdown" onclick="showMenu()">
    <div class="header-standard">
      <img id="menicon" src="./images/menu-icon.png" data-toggle="dropdown" onclick="showMenu()">
      <?php if(isset($_SESSION['user'])){
        if($_SESSION['user'] == "admin" || $_SESSION['user'] == "guest") { ?>
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
        <?php } } 
          if((!isset($_SESSION['user']) || $_SESSION['user'] == "unknown")) { ?>
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
        <div class="forma-contact">
            <form id="contact_form" method="POST" enctype="multipart/form-data" accept-charset="utf-8"
                                    onsubmit="return validacijaKontakt()">
                <ul>
                    <li> 
                        <input id="nameContact" placeholder="Name" name="name" required/>
                    </li>
                     <li> 
                        <input id="emailContact" placeholder="Email" name="email" type="text" required/><br />
                    </li>
                    <li id="textarea"> 
                        <textarea id="message" placeholder="Your message" name="message" required></textarea><br />
                    </li>
                    <p id="warningMessage"> </p>
                    <li>
                        <input id="submit-button" type="submit" value="Send Email" />
                    </li>
                </ul>
            </form>	
        </div>
        <script src="script/skripta.js" type="text/javascript"></script>
     </body>
</html>