<?php
if (isset($_POST['WijzigKnop'])) {
    include "header.php";

    require 'config.php';

    $ID_artiest = $_POST['ID_artiest'];
    $Naam = $_POST['Naam'];
    $Instrument = $_POST['Instrument'];
    $Geboortedatum = $_POST['Geboortedatum'];
    $Geslacht = $_POST['Geslacht'];
    $Info = $_POST['Info'];
    $Band = $_POST['Band'];

    $query = "UPDATE back13_artiesten
          SET Naam = '$Naam', Instrument = '$Instrument', Geboortedatum = '$Geboortedatum', Geslacht = '$Geslacht', Info = '$Info' , Band = '$Band'
          WHERE ID_artiest = $ID_artiest";



    if(mysqli_query($mysqli, $query))
    {
        echo "<p>artiest $ID_artiest is aangepast!.</p>";
    }
    else
    {
        echo "<p>FOUT bij aanpassen artiest met id $ID_artiest.</p>";
    }
}

echo "<p><a href='band_uitlees.php'>TERUG</a> naar bands</p>";
echo "<p><a href='artiest_uitlees.php'>TERUG</a> naar artiesten</p>";
?>