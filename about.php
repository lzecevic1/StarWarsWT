<?php
session_start();
$xml = new DOMDocument();
$xml->load('poslovnice.xml');
$error = false;

  if(isset($_POST['obrisiDugme']))
  {
    $xml = new DOMDocument();
    $xml->load('poslovnice.xml');
    //$_POST['obrisiDugme']) dat ce value dugmeta koje je pritisnuto
    $docElement = $xml->documentElement;
    $podaci = $docElement->getElementsByTagName('Podaci');
    $rmv = null;
    $i = $_POST['obrisiDugme'];
    $rmv = $podaci[$i - 1];
    if($rmv != null) $docElement->removeChild($rmv);
                  
    file_put_contents('poslovnice.xml', $xml->saveXML());
}

if(isset($_POST['dodajPoslovnicu']))
{
    if($_POST['adresa'] != "" && $_POST['brojTelefona'] != "")
    {
        // $_SESSION['user'] = $_POST;
        $rootTag = $xml->getElementsByTagName("Poslovnice")->item(0);
        
        $dataTag = $xml->createElement("Podaci");
        
        $adresaTag = $xml->createElement("Adresa");
        $adresaTag->appendChild($xml->createTextNode($_REQUEST['adresa']));
        
        $brojTelefonaTag  = $xml->createElement("BrojTelefona");
        $brojTelefonaTag ->appendChild($xml->createTextNode($_REQUEST['brojTelefona']));
        
        $dataTag->appendChild($adresaTag);
        $dataTag->appendChild($brojTelefonaTag);
        
        $rootTag->appendChild($dataTag);
        $xml->save('poslovnice.xml');
        header('Location:'.$_SERVER['PHP_SELF']);
    }
    else $error = true;
}



?>

  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8">
    <title>About</title>
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body class="page">

  <!-- Meni -->
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

    <br>
    <br>
    <br>
    <!-- Tabela sa poslovnicama -->
    <table border="1px solid black" align="center" style="width:75%" bgcolor="#C0C0C0">
     <!-- Zaglavlje tabele -->
      <tr>
        <th>Adresa poslovnice</th>
        <th>Broj telefona</th>
      </tr>

      <!-- PHP kod za dodavanje poslovnica iz XML file-a u tabelu -->
      <?php
        $xml = simplexml_load_file('poslovnice.xml');
        $x = 1;
        foreach ($xml->children() as  $value) { ?>
        <!-- Red tabele sadrži adresu, broj telefona poslovnice i dugmad za dodavanje i brisanje poslovnice -->
        <tr>
          <td align="center"> <?php print $value->Adresa ?> </td>
          <td align="center"> <?php print $value->BrojTelefona ?> </td>
          <td align="center"> 
            <form action='about.php' method='post'>
            <button type="submit" name="editDugme" value="<?php echo $x;?>"> Edituj </button>
            <button type="submit" name="obrisiDugme" value="<?php echo $x;?>"> Obriši </button>
            </form>
          </td>
        </tr>
        <?php $x++; }  ?>
        </table>

        <?php
        // Ako je user admin, onda moze dodavati nove poslovnice, vidjeti PDF izvjestaj i downloadovati CSV file 
        if($_SESSION['user'] == "admin") { ?>

          <form align='center' id='poslovniceForma' action='about.php' method='post' onsubmit="return dodajPoslovnicu()">;
          <br>
           <input type='text' name='adresa' placeholder='Adresa'>
            <input type='text' name='brojTelefona' placeholder='Broj telefona'>
            <input id='dodajPoslovnicu-button' name='dodajPoslovnicu' type='submit' value='Dodaj' />
            <?php if($error == true) { ?>
              <p style="padding-top:1.5%; padding-bottom:0.2%; margin-left:-50px;" id="warningMessage"> Nisu uneseni podaci o poslovnici! </p>
            <?php } ?>

          </form>

          <!-- Izvjestaj u PDF-u i csv file -->
          <div style="padding-left:43%; padding-top:2%;">
            <form style="display:inline-block;" id="izvjestajForma" action="izvjestaj.php">
              <input id="izvjestaj-button" type="submit" value="PDF izvještaj">
            </form>
            <form style="display:inline-block;" id="downloadForma" action="downloadcsv.php">
              <input id="download-button" type="submit" value="Download csv">
            </form>
          </div>

    <?php }?>
    
      <script src="script/skripta.js" type="text/javascript"></script>
  </body>

  </html>