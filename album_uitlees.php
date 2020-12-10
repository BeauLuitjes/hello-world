<?php
include "header.php";

require 'config.php';

$opdracht = "SELECT * FROM back13_albums";

if ($resultaat = mysqli_query($mysqli, $opdracht))
    $band = mysqli_fetch_array($resultaat);
{
    echo "<table border='1' cellspacing='0' cellpadding='3'>";

    echo "<tr><th>Titel:</th><th>Band</th><th>Jaar</th>";
    echo "<th>Info</th><th>Afbeelding</th><th>Wijzig</th><th>Verwijder</th></tr>";

    while ($Titel = mysqli_fetch_array($resultaat))
    {
        echo "<tr><td>" . $Titel['Titel'] . "</td>";
        echo "<td>" . $Titel['Band'] . "</td>";
        $idBand = $Titel['Band'];
        $zoekBand = "SELECT Naam FROM back12_bands WHERE ID_band = " . $idBand;
        $resultaatBand = mysqli_query($mysqli, $zoekBand);
        $band = mysqli_fetch_array($resultaatBand);
        echo "<td>" . $Titel['Jaar'] . "</td>";
        echo "<td>" . $Titel['Info'] . "</td>";
        echo "<td>" . "<img src = '../albums/" . $Titel['Afbeelding'] . "' width='100px'/>" . "</td>";

        echo "<td> <a href='album_aanpas.php?id=".$Titel['ID_album']."'>Wijzig</a></td>";
        echo "<td> <a href='album_verwijder.php?id=".$Titel['ID_album']."'>Verwijder</a></td></tr>";

    }

    echo "</table>";
}

?>
<a href="album_toevoeg.php">Naar albums toevoegen!</a>