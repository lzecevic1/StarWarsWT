<?php
$xml = new DOMDocument();
$xml->load("poslovnice.xml");

$data = $xml->getElementsByTagName('Podaci');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint = "";
  for($i = 0; $i < ($data->length); $i++)
  {
      $adresa = $data->item($i)->getElementsByTagName('Adresa');
      $brojTelefona = $data->item($i)->getElementsByTagName('BrojTelefona'); 
      $radnoVrijeme = $data->item($i)->getElementsByTagName('RadnoVrijeme');

    if ($adresa->item(0)->nodeType == 1)
    {
      //find a link matching the search text
      if (stristr($adresa->item(0)->childNodes->item(0)->nodeValue, $q)) 
      {
        if ($hint == "") 
        {
          $hint="<a href='" . 
          $brojTelefona->item(0)->childNodes->item(0)->nodeValue . 
          $adresa->item(0)->childNodes->item(0)->nodeValue . "</a>";
        } 
        else 
        {
          $hint = $hint . "<br /><a href='" . 
          $brojTelefona->item(0)->childNodes->item(0)->nodeValue . 
          "' target='_blank'>" . 
          $adresa->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
  }
}

  // Set output to "no suggestion" if no hint was found
  // or to the correct values
  if ($hint=="") $response="no suggestion";
  else $response=$hint;

  //output the response
  echo $response;
?>