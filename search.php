<?php
  $xml = new DOMDocument();
  $xml->load("poslovnice.xml");

  $data = $xml->getElementsByTagName('Podaci');

  // parametar iz URL
  $suggestion = $_GET["q"];

  if (strlen($suggestion) > 0) // ako suggestion postoji
  {
    $hint = "";

    for($i = 0; $i < $data->length; $i++) 
    {
      $adrese = $data->item($i)->getElementsByTagName('Adresa');
      $telefoni = $data->item($i)->getElementsByTagName('BrojTelefona');
      $vrijeme = $data->item($i)->getElementsByTagName('RadnoVrijeme');

      if ($adrese->item(0)->nodeType==1) 
      {
        if (stristr($adrese->item(0)->childNodes->item(0)->nodeValue, $suggestion)) 
        {
          if ($hint == "") 
          {
            $hint= $adrese->item(0)->childNodes->item(0)->nodeValue;
          } 
          else 
          {
            $hint= $hint . "<br />" .  $adrese->item(0)->childNodes->item(0)->nodeValue;
          }
        }
      }

      if($telefoni->item(0)->nodeType == 1)
      {
        if (stristr($telefoni->item(0)->childNodes->item(0)->nodeValue, $suggestion))
        {
          if ($hint == "") 
          {
            $hint= $telefoni->item(0)->childNodes->item(0)->nodeValue;
          } 
          else 
          {
            $hint= $hint . "<br />" .  $telefoni->item(0)->childNodes->item(0)->nodeValue;
          }
        }
      }
    }
  }

    if ($hint=="") {
      $response="no suggestion";
    } else {
      $response=$hint;
    }

    //output the response
    echo $response;
?>