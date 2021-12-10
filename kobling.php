<?php

// Tilkoblingsinformasjon
$tjener = "localhost";
$brukernavn = "root";
$passord = "root";
$database = "Cricket"; //Endre på denne til din database

// Opprette en kobling
$kobling = new mysqli($tjener, $brukernavn, $passord, $database);

// Sjekk om koblingen virker
if($kobling->connect_error) {
    die("Noe gikk galt: " . $kobling->connect_error);
} else {
  //  echo "Koblingen virker.<br>";
}

// Angi UTF-8 som tegnsett
$kobling->set_charset("utf8");

 ?>
