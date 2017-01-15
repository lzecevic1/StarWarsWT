<?php

    session_start();

    $veza = new PDO("mysql:dbname=starwarsdb;host=localhost;charset=utf8", "swuser", "swpass");
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
            $query = $veza->prepare("SELECT a.adresa, r.naziv, s.kolicina from poslovnica a, artikal r, skladiste s where a.id = s.poslovnica and r.id = s.artikal");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
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
        <script src="script/skripta.js" type="text/javascript"></script>
    </body>
</html>