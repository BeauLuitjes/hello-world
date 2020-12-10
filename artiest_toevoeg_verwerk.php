<?php

if (isset($_POST['toevoegKnop'])) {
    include "header.php";

    require('config.php');

    $Naam = $_POST['Naam'];
    $Instrument = $_POST['Instrument'];
    $Geboortedatum = $_POST['Geboortedatum'];
    $Geslacht = $_POST['Geslacht'];
    $Info = $_POST['Info'];
    $Band = $_POST['Band'];

    $foutmelding = " ";

    if (empty($Naam)) {
        $foutmelding .= "Er is geen naam ingevuld!<br>";
    }
    if (empty($Instrument)) {
        $foutmelding .= "Er is geen instrument ingevuld!<br>";
    }

    if ($foutmelding != " ") {
        echo "<h3>Er is iets fout gegaan:</h3>";
        echo $foutmelding;
    } else {


        $query = "INSERT INTO back13_artiesten
          VALUES (NULL, '$Naam', '$Instrument', '$Geboortedatum', '$Geslacht', '$Info', '$Band')";

        if (mysqli_query($mysqli, $query)) {
            echo "<p>$Naam is toegevoegd!.</p>";
        } else {
            echo "<p>FOUT bij toevoegen $Naam.</p>";
            echo "Query: $query <br/>";
            echo "Foutmelding: " . mysqli_error($mysqli);
        }
    }
}
echo "<p><a href='artiest_toevoeg.php'>Ga terug naar band kiezen</a></p>";

?>

