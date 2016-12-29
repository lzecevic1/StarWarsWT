<?php
  $xml = new DOMDocument();
  $xml->load("poslovnice.xml");

  $data = $xml->getElementsByTagName('Podaci');

  // parametar iz URL
  $suggestion = $_GET["q"];

  if (strlen($suggestion) > 0) // ako suggestion postoji
  {
    $rez = "";

    for($i = 0; $i < $data->length; $i++) 
    {
      $adrese = $data->item($i)->getElementsByTagName('Adresa');
      $telefoni = $data->item($i)->getElementsByTagName('BrojTelefona');
      $vrijeme = $data->item($i)->getElementsByTagName('RadnoVrijeme');

      if ($adrese->item(0)->nodeType==1) 
      {
        if (stristr($adrese->item(0)->childNodes->item(0)->nodeValue, $suggestion)) 
        {
          if ($rez == "") 
          {
            $rez = $adrese->item(0)->childNodes->item(0)->nodeValue;
          } 
          else 
          {
            $rez = $rez . "<br />" .  $adrese->item(0)->childNodes->item(0)->nodeValue;
          }
        }
      }

      if($telefoni->item(0)->nodeType == 1)
      {
        if (stristr($telefoni->item(0)->childNodes->item(0)->nodeValue, $suggestion))
        {
          if ($rez == "") 
          {
            $rez = $telefoni->item(0)->childNodes->item(0)->nodeValue;
          } 
          else 
          {
            $rez = $rez . "<br />" .  $telefoni->item(0)->childNodes->item(0)->nodeValue;
          }
        }
      }
    }
  }

    if ($rez == "") $izlaz = "Nema rezultata";
    else $izlaz = $rez;
    
    echo $izlaz;
?>