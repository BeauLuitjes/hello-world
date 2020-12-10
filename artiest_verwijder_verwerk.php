<?php
if (isset($_POST['verwijderknop'])) {
    include "header.php";

    require 'config.php';
    $ID_artiest = $_POST['ID_artiest'];
    $Naam = $_POST['Naam'];
    $Geboortedatum = $_POST['Geboortedatum'];

    $query = "DELETE FROM back13_artiesten
              WHERE ID_artiest = $ID_artiest";


    if(mysqli_query($mysqli, $query))
    {
        echo "<p>Artiest $ID_artiest is verwijderd!.</p>";
    }
    else
    {
        echo "<p>FOUT bij verwijderen artiest met id $ID_artiest.</p>";
    }
}
echo "<p><a href='artiest_uitlees.php'>TERUG</a> naar overzicht</p>";
?>