<?php

include "header.php";

require 'config.php';
$opdracht = "SELECT * FROM back13_artiesten";

if ($resultaat = mysqli_query($mysqli, $opdracht))
{
    echo "<table border='1' cellspacing='0' cellpadding='3'>";

    echo "<tr><th>Naam:</th><th>Instrument</th><th>Geboortedatum</th>";
    echo "<th>Geslacht</th><th>Info</th><th>Band</th><th>Wijzig</th><th>Verwijder</th></tr>";

    while ($Naam = mysqli_fetch_array($resultaat))
    {
        echo "<tr><td>" . $Naam['Naam'] . "</td>";
        echo "<td>" . $Naam['Instrument'] . "</td>";
        echo "<td>" . $Naam['Geboortedatum'] . "</td>";
        echo "<td>" . $Naam['Geslacht'] . "</td>";
        echo "<td>" . $Naam['Info'] . "</td>";


        $idBand = $Naam['Band'];
        $zoekBand = "SELECT Naam FROM back12_bands WHERE ID_band = " . $idBand;
        $resultaatBand = mysqli_query($mysqli, $zoekBand);
        $band = mysqli_fetch_array($resultaatBand);

        echo "<td>" . $band['Naam'] . "</td>";
        echo "<td> <a href='artiest_pasaan.php?id=".$Naam['ID_artiest']."'>Wijzig</a></td>";
        echo "<td> <a href='artiest_verwijder.php?id=".$Naam['ID_artiest']."'>Verwijder</a></td></tr>";

    }

    echo "</table>";
}

?>
<a href="artiest_toevoeg.php">Naar artiest toevoegen!</a>
