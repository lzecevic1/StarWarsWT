<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Star Wars Details</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="page">
    <div class="header-standard">
      <img id="menicon" src="./images/menu-icon.png" data-toggle="dropdown" onclick="showMenu()">
      <?php if(isset($_SESSION['user'])){
        if($_SESSION['user'] == "admin" || $_SESSION['user'] == "guest") { ?>
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
        <div class="col-2">          
                <div class="jedi-article">
                    <h2>obi - wan Kenobi</h2>
                    <img id="jedi-image" src="images/ob2.jpg" alt="ObiOne">
                    <p>                    
                         Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                         Etiam dictum nunc massa, vitae vehicula mi lacinia et. 
                         Donec eu fringilla erat.
                    </p>
                </div>
        </div>
        <div class="col-2">          
                <div class="jedi-article">
                    <h2>qui - gonn Jinn</h2>
                    <img id="jedi-image" src="images/quigon.png" alt="QuiGonn">
                    <p>                    
                         Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                         Etiam dictum nunc massa, vitae vehicula mi lacinia et. 
                         Donec eu fringilla erat.
                    </p>
                </div>
        </div>
        <div class="col-2">          
                <div class="jedi-article">
                    <h2>Master Yoda</h2>
                    <img id="jedi-image" src="images/yoda.jpeg" alt="Yoda">
                    <p>                    
                         Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                         Etiam dictum nunc massa, vitae vehicula mi lacinia et. 
                         Donec eu fringilla erat.
                    </p>
                </div>
        </div>
        <script src="script/skripta.js" type="text/javascript"></script>
    </body>
</html>