<?php
    session_start();
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
              <li><a href="about.php">About us</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li><a href="login.php">Log in</a></li>
              <li><a href="register.php">Sign up</a></li>
            </ul>
        <?php } ?>
        </div>
            <div class="forma-login">
                <form id = "formaLogin" method="post" action="checklogin.php" onsubmit="return validacijaLogin()">
                    <ul>
                        <li> 
                            <input id="emailLogin" type="text" name="usermail" placeholder="Email" required>
                        </li>
                        <li >
                            <input id="passwordLogin" type="password" name="password" placeholder="Password" required>
                        </li>
                        <?php if(isset($_SESSION['user']) && $_SESSION['user'] == "unknown") { ?>
                            <p style="padding-top:1.5%; padding-bottom:1.5%; margin-left:-50px;" id="warningMessage"> Nepostojeći korisnik! Pokušajte se logovati ponovo. </p>
                        <?php session_unset(); } ?>
                        <!--/*else { ?>
                            <p style="display:none" id="warningMessage"> Nepostojeći korisnik! Pokušajte se logovati ponovo. </p>
                       } */-->

                        <li id="submit-button-li">
                            <input id="submit-button" type="submit" value="Log in" name="login">
                        </li>
                    </ul>
                </form>
            </div>
            <script src="script/skripta.js" type="text/javascript"></script>
     </body>
</html>