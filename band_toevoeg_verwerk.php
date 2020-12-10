<?php
include 'header.php';

if (isset($_POST['toevoegKnop'])) {

    require ('config.php');

    $Naam = $_POST['Naam'];
    $Land = $_POST['Land'];
    $Aantalleden = $_POST['Aantalleden'];
    $Muzieksoort = $_POST['Muzieksoort'];
    $Info = $_POST['Info'];

    $query = "INSERT INTO back12_bands
          VALUES (NULL, '$Naam', '$Land', '$Aantalleden', '$Muzieksoort', '$Info')";

    if (mysqli_query($mysqli, $query)) {
        echo "<p>$Naam is toegevoegd!.</p>";
    } else {
        echo "<p>FOUT bij toevoegen $Naam.</p>";
        echo "Query: $query <br/>";
        echo "Foutmelding: " . mysqli_error($mysqli);
    }
}


