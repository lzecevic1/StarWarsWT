<?php

  // $veza = new PDO("mysql:dbname=starwarsdb;host=localhost;charset=utf8", "swuser", "swpass");
  $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=starwarsdb', 'swuser', 'swpass');
  // $veza = new PDO("mysql:dbname=starwarsdb;host=mysql-57-centos7", "swuser", "swpass");
  
  // parametar iz URL
  $suggestion = $_GET["q"];
  $query = $veza->prepare("SELECT a.adresa, r.naziv, s.kolicina from poslovnica a, artikal r, skladiste s where a.id = s.poslovnica and r.id = s.artikal");
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  $adrese = [];
  $artikli = [];
  foreach($result as $r)
  {
    array_push($adrese,$r['adresa']);
    array_push($artikli,$r['naziv']);
  }


  if (strlen($suggestion) > 0) // ako suggestion postoji
  {
    $rez = "";
    $brojRezultata = 0;

    for($i = 0; $i < count($adrese); $i++) 
    {
        if (stristr($adrese[$i], $suggestion)) 
        {
          $brojRezultata++;
          if ($rez == "") 
          {
            $rez = $adrese[$i];
          } 
          else 
          {
            $rez = $rez . "<br />" . $adrese[$i];
          }
        }

        if (stristr($artikli[$i], $suggestion))
        {
          $brojRezultata++;
          if ($rez == "") 
          {
            $rez = $artikli[$i];
          } 
          else 
          {
            $rez = $rez . "<br />" . $artikli[$i];
          }
        }
      }
      if($brojRezultata == 10) break;
  }

    if ($rez == "") $izlaz = "Nema rezultata";
    else $izlaz = $rez;
    
    echo $izlaz;
?>