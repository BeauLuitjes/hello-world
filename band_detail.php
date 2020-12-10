<?php

include "header.php";
require 'config.php';

$userID = $_GET['id'];

$query = "SELECT * FROM back12_bands WHERE ID_band = " . $userID;
$resultaat = mysqli_query($mysqli, $query);
$band = mysqli_fetch_array($resultaat);
if (mysqli_num_rows($resultaat) == 0)
{
echo "<p>Er is geen user met ID $userID.</p>";
}

else
{
//$rij = mysqli_fetch_array($resultaat);

echo "<h2>Gegevens van user met ID " . $userID . ":</h2>";
echo "<table border='1'>";

    echo "<tr><td>Naam band:</td>";
        echo    "<td>" . $band['Naam'] . "</td></tr>";
    echo "<tr><td>Land van herkomst:</td>";
        echo    "<td>" . $band['Land'] . "</td></tr>";
    echo "<tr><td>Aantal leden::</td>";
        echo    "<td>" . $band['Aantalleden'] . "</td></tr>";
    echo "<tr><td>Soort muziek:</td>";
        echo    "<td>" . $band['Muzieksoort'] . "</td></tr>";
    echo "<tr><td>Extra informatie:</td>";
    echo    "<td>" . $band['Info'] . "</td></tr>";
    echo "</table>";

    }

$zoekLeden = "SELECT * FROM back13_artiesten WHERE Band = "  . $band['ID_band'];
$alleLeden = mysqli_query($mysqli, $zoekLeden);
if (mysqli_num_rows($alleLeden)==0)
{
    echo "<h3>Geen leden van de band gevonden</h3>";
}
else {

    echo "<h3>De leden van de band:</h3>";
    echo "<table border='1' cellspacing='0' cellpadding='3'>";
    echo "<tr><th>Naam:</th><th>Instrument</th>";
    while ($Naam = mysqli_fetch_array($alleLeden)) {
        echo "<tr><td>" . $Naam['Naam'] . "</td>";
        echo "<td>" . $Naam['Instrument'] . "</td></tr>";
    }
    echo "</table>";
}

$zoekAlbums = "SELECT * FROM back13_albums WHERE Band = "  . $band['ID_band'];
$alleAlbums = mysqli_query($mysqli, $zoekAlbums);
if (mysqli_num_rows($alleAlbums)==0)
{
    echo "<h3>Geen albums gevonden</h3>";
}
else {

    echo "<h3>De albums:</h3>";
    echo "<table border='1' cellspacing='0' cellpadding='3'>";
    echo "<tr><th>Titel:</th><th>Jaar</th><th>Afbeelding</th>";

    while ($Naam = mysqli_fetch_array($alleAlbums)) {
        echo "<tr><td>" . $Naam['Titel'] . "</td>";
        echo "<td>" . $Naam['Jaar'] . "</td>";
        echo "<td>" . "<img src = '../albums/" . $Naam['Afbeelding'] . "' width='100px'/>" . "</td></tr>";

    }
    echo "</table>";
}

    echo "<p>Terug naar <a href='band_uitlees.php?'>overzicht</a></td></p>";
    ?>
