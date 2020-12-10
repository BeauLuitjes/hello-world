<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');


if (isset($_POST['toevoegKnop'])) {
    include "header.php";

    require 'config.php';


    $Titel = $_POST['Titel'];
    $Band = $_POST['Band'];
    $Jaar = $_POST['Jaar'];
    $Info = $_POST['Info'];
    $Afbeelding = $_FILES['AfbeeldingVeld'];
    $tijdelijk = $Afbeelding['tmp_name'];
    $naam = $Afbeelding['name'];
    $type = $Afbeelding['type'];
    $map = "../albums/";

    $toegestaan = array("image/jpeg", "image/gif", "image/png");
    if (in_array($type, $toegestaan))
    {

        if (move_uploaded_file($tijdelijk, $map.$naam))
        {
            echo "Het is gelukt!<br>";
        }
        else
        {
            echo "Er is iets fout gegaan!<br>";
        }
    }
    else
    {
        echo "Dit bestandstype ($type) is niet toegestaan!<br>";
    }
}
//Maak de query
$query = "INSERT INTO back13_albums
              VALUES (NULL, '$Titel', '$Band', '$Jaar', '$Info', '$naam')";

//Als de opdracht goed word uitgevoerd
if (mysqli_query($mysqli, $query)) {
    echo "$Titel is toegevoegd!.<br>";
} else {
    echo "<p>FOUT bij toevoegen $Titel!</p>";
    echo "Query: $query <br>";
    echo "foutmelding: " . mysqli_error($mysqli);
}

?>

<p><a href='album_toevoeg.php'>Ga terug naar album toevoegen</a></p>
<p><a href='album_uitlees.php'>Ga terug naar album uitlees</a></p>

