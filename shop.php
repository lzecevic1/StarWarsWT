<!DOCTYPE html>
<?php
    session_start();
    $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=starwarsdb', 'swuser', 'swpass');
    // $veza = new PDO("mysql:dbname=starwarsdb;host=localhost;charset=utf8", "swuser", "swpass");

    // Dodavanje artikla u tabelu Artikal
    if(isset($_POST['dodajArtikal']))
    {
      $naziv = $_POST['naziv'];
      $opis = $_POST['opis'];
      $cijena = $_POST['cijena'];

      /* PROVJERA DA LI U BAZI VEC POSTOJI ARTIKAL SA ISTIM NAZIVOM */
        $provjera = $veza->prepare("SELECT COUNT(*) FROM Artikal WHERE naziv=?");
        $provjera->bindValue(1, htmlspecialchars($naziv, ENT_QUOTES, "UTF-8"), PDO::PARAM_STR);
        $provjera->execute();
        $broj = $provjera->fetchColumn();

        // TODO: DODAJ ISPIS GREŠKE AKO SE DODA ISTI ARTIKAL
        if($broj == 0)
        {
          $insert = $veza->prepare('INSERT INTO Artikal (id, naziv, opis, cijena) 
            VALUES (NULL, ?, ?, ?)');
           $insert->bindValue(1, htmlspecialchars($naziv, ENT_QUOTES, "UTF-8"), PDO::PARAM_STR);
           $insert->bindValue(2, htmlspecialchars($opis, ENT_QUOTES, "UTF-8"), PDO::PARAM_STR); 
           $insert->bindValue(3, htmlspecialchars($cijena, ENT_QUOTES, "UTF-8"), PDO::PARAM_STR);
           $insert->execute();
        }
    }
    
    // Dodavanje artikla u neku poslovnicu
    if(isset($_POST['dodajArtikalSkladiste']))
    {
        $poslovnica = $_POST['idPoslovnice'];
        $artikal = $_POST['idArtikla'];
        $kolicina = $_POST['kolicina'];

        $provjera = $veza->prepare("SELECT COUNT(*) FROM skladiste WHERE poslovnica=? and artikal=?");
        $provjera->bindValue(1, htmlspecialchars($poslovnica, ENT_QUOTES, "UTF-8"), PDO::PARAM_STR);
        $provjera->bindValue(2, htmlspecialchars($artikal, ENT_QUOTES, "UTF-8"), PDO::PARAM_STR);
        $provjera->execute();
        $broj = $provjera->fetchColumn();
        if($broj == 0)
        {
            $insert = $veza->prepare('INSERT INTO Skladiste (id, poslovnica, artikal, kolicina) 
              VALUES (NULL, ?, ?, ?)');         
           $insert->bindValue(1, htmlspecialchars($poslovnica, ENT_QUOTES, "UTF-8"), PDO::PARAM_INT);
           $insert->bindValue(2, htmlspecialchars($artikal, ENT_QUOTES, "UTF-8"), PDO::PARAM_INT); 
           $insert->bindValue(3, htmlspecialchars($kolicina, ENT_QUOTES, "UTF-8"), PDO::PARAM_INT);
           $insert->execute();
        }

    }

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
      <?php if(isset($_SESSION['user'])){
        if($_SESSION['user'] == "admin" || $_SESSION['user'] == "sef") { ?>
        <ul id="meni">
          <li><a id="home-link" href="index.php">Star Wars Details</a></li>
          <li><a href="planets.php">Planets</a></li>
          <li><a href="jedi.php">Jedi</a></li>
          <li><a href="siths.php">Siths</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="stock.php">Stock</a></li>
          <li><a href="about.php">About us</a></li>
          <li><a href="logout.php">Log out</a></li>
        </ul>
        <?php }
        if($_SESSION['user'] == "guest") { ?>
        <ul id="meni">
          <li><a id="home-link" href="index.php">Star Wars Details</a></li>
          <li><a href="planets.php">Planets</a></li>
          <li><a href="jedi.php">Jedi</a></li>
          <li><a href="siths.php">Siths</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="about.php">About us</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="logout.php">Log out</a></li>
        </ul>
         <?php } } 
          if((!isset($_SESSION['user']) || $_SESSION['user'] == "unknown")) { ?>
            <ul id="meni">
              <li><a id="home-link" href="index.php">Star Wars Details</a></li>
              <li><a href="planets.php">Planets</a></li>
              <li><a href="jedi.php">Jedi</a></li>
              <li><a href="siths.php">Siths</a></li>
              <li><a href="shop.php">Shop</a></li>
              <li><a href="about.php">About us</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li><a href="login.php">Log in</a></li>
              <li><a href="register.php">Sign up</a></li>
            </ul>
        <?php } ?>
        </div>
        <?php if($_SESSION['user'] == "guest"){ ?>
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
        <?php }?>
    <br>
    <br>
    <br>
        <?php if($_SESSION['user'] == "sef" || $_SESSION['user'] == "admin"){ ?>

        <div class="col-5">
        <div class="col-3">
        <!-- Tabela sa artiklima -->
          <table  border="1px solid black" align="center" style="width:90%" bgcolor="#ffffff">
          <!-- Zaglavlje tabele -->
            <tr>
              <th>ID artikla</th>
              <th>Naziv artikla</th>
              <th>Opis</th>
              <th>Cijena</th>
            </tr>

            <?php 
            $query = $veza->prepare("SELECT * FROM artikal");
            $query->execute();
            $artikli = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($artikli as $artikal)
            { ?>
            <tr>
              <td align="center"> <?php print $artikal['id'] ?> </td>
              <td align="center"> <?php print $artikal['naziv'] ?> </td>
              <td align="center"> <?php print substr($artikal['opis'], 0, 15).'...' ?> </td>
              <td align="center"> <?php print $artikal['cijena'] ?> </td>
            </tr>
           <?php } ?>
          </table>
          </div>

           <!--Tabela sa adresom poslovnice i ID-em poslovnice -->
          <div  class="col-3">
          <table border="1px solid black" style=" width:90%" bgcolor="#ffffff">
          <!-- Zaglavlje tabele -->
            <tr>
              <th>ID poslovnice</th>
              <th>Adresa poslovnice</th>
            </tr>
            <?php 
            $query = $veza->prepare("SELECT id, adresa from Poslovnica");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $poslovnica)
            {
              ?>
                <tr>
                <td align="center"> <?php print $poslovnica['id'] ?> </td>
                <td align="center"> <?php print $poslovnica['adresa'] ?> </td>
                </tr> <?php
            }?>
          </table>
          </div>
          </div>

          <!-- FORMA ZA UNOS ARTIKLA -->
            <div class="col-5">
            <form style="padding-left: 2.5%; padding-top:1%;" method="post" action="shop.php">
              <input placeholder="Naziv artikla" name="naziv" required/>
              <input placeholder="Cijena artikla" name="cijena" type="number" required/>
              <input placeholder="Opis artikla" name="opis" required/>
              <input name="dodajArtikal" type="submit" value="Dodaj artikal" />
            </form>	
            </div>
              <!-- FORMA ZA UNOS ARTIKLA U SKLADIŠTE NEKE POSLOVNICE -->
          <div class="col-5">
          <form style="padding-left: 2.5%; padding-top:1%;" method="post" action="shop.php">
            <input placeholder="ID poslovnice" name="idPoslovnice" type="number" required/>
              <input placeholder="ID artikla" name="idArtikla" type="number" required/>
              <input placeholder="Količina" name="kolicina" type="number" required/>
                    <!--<p id="warningMessage"> </p>-->
            <input name="dodajArtikalSkladiste" type="submit" value="Dodaj artikal u skladište" />
            </form>	
          </div>

        <?php } ?>
        <script src="script/skripta.js" type="text/javascript"></script>
    </body>
</html>