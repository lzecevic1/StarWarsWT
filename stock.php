<?php
    session_start();

    // $veza = new PDO("mysql:dbname=starwarsdb;host=localhost;charset=utf8", "swuser", "swpass");
      $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=starwarsdb', 'swuser', 'swpass');
    // $veza = new PDO("mysql:dbname=starwarsdb;host=mysql-57-centos7", "swuser", "swpass");
?>

<html>
    <head>
        <meta charset="UTF-8">
        <META http-equiv="Content-Type" content="text/html; charset=utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Star Wars Details</title>
        <link rel="stylesheet" href="css/style.css">
        <script>
            function prikaziRezultate(unos)
            {
                var rezultati = document.getElementById("rezultati");

                //Ako nije nista upisano
                if (unos.length == 0)
                {
                    rezultati.innerHTML = "";
                    rezultati.style.border = "0px";
                    return;
                }

                if (window.XMLHttpRequest) httprequest = new XMLHttpRequest();
                else httprequest = new ActiveXObject("Microsoft.XMLHTTP");

                httprequest.onreadystatechange = function()
                {
                    if (this.readyState == 4 && this.status == 200)
                    {
                        rezultati.innerHTML = this.responseText;
                        rezultati.style.position = "absolute";
                        rezultati.style.backgroundColor = "black";
                        rezultati.style.color = "white";
                    }
                }

                httprequest.open("GET", "search.php?q=" + unos, true);
                httprequest.send();
            }
        </script>
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
        <?php } }?>
        </div>

        <div class="col-5" style="padding-top:6%;">
        <table border="1px solid black" align="center" style="width:90%" bgcolor="#ffffff">
            <tr>
              <th>Adresa poslovnice</th>
              <th>Ime artikla</th>
              <th>Količina</th>
            </tr>   
            <?php 
            $result = $veza->query("select a.adresa, r.naziv, s.kolicina from poslovnica a, artikal r, skladiste s where a.id = s.poslovnica and r.id = s.artikal");
            foreach($result as $r)
            { ?>
            <tr>
              <td align="center"> <?php print $r['adresa'] ?> </td>
              <td align="center"> <?php print $r['naziv'] ?> </td>
              <td align="center"> <?php print $r['kolicina'] ?> </td>
            </tr>
           <?php } ?>
          </table>
          </div>

            <div class="col-5" style="padding-top:2%; padding-left:5%">
            <!-- FORMA ZA SEARCH -->
            <form>
              <input style="color:black;" type="text" size="25" placeholder="Search" onkeyup="prikaziRezultate(this.value)">
              <button> Pretraži </button>
              <div id="rezultati"></div>
            </form>
            </div>
        <script src="script/skripta.js" type="text/javascript"></script>
    </body>
</html>