<?php
if (isset($_POST['verwijderknop'])) {
    include "header.php";

    require 'config.php';
    $ID_album= $_POST['ID_album'];
    $Titel = $_POST['Titel'];
    $Jaar = $_POST['Jaar'];
    $Afbeelding = $_POST['Afbeelding'];

    $query = "DELETE FROM back13_albums
              WHERE ID_album = $ID_album";


    if(mysqli_query($mysqli, $query))
    {
        echo "<p>Album $ID_album is verwijderd!.</p>";
    }
    else
    {
        echo "<p>FOUT bij verwijderen album met id $ID_album.</p>";
    }
}
echo "<p><a href='album_uitlees.php'>TERUG</a> naar overzicht</p>";
?>