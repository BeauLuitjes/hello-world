<?php
if (isset($_POST['WijzigKnop'])) {
    include "header.php";

    require 'config.php';

    $ID_album = $_POST['ID_album'];
    $Titel = $_POST['Titel'];
    $Band = $_POST['Band'];
    $Jaar = $_POST['Jaar'];
    $Info = $_POST['Info'];
    $Afbeelding = $_FILES['Afbeelding'];
    $tijdelijk = $Afbeelding['tmp_name'];
    $naam = $Afbeelding['name'];
    $type = $Afbeelding['type'];
    $map = "../albums/";

    $toegestaan = array("image/jpeg", "image/gif", "image/png");
    if (in_array($type, $toegestaan))
    {

        if (move_uploaded_file($tijdelijk, $map.$naam))
        {
            echo "Het is gelukt om je plaatje te veranderen!<br>";
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


    $query = "UPDATE back13_albums
          SET Titel = '$Titel', Band = '$Band', Jaar = '$Jaar', Info = '$Info', Afbeelding = '$naam'
          WHERE ID_album = $ID_album";



    if(mysqli_query($mysqli, $query))
    {
        echo "<p>Album $ID_album is aangepast!.</p>";
    }
    else
    {
        echo "<p>FOUT bij aanpassen Album met id $ID_album.</p>";
    }
}

echo "<p><a href='band_uitlees.php'>TERUG</a> naar bands</p>";
echo "<p><a href='artiest_uitlees.php'>TERUG</a> naar artiesten</p>";
echo "<p><a href='album_uitlees.php'>TERUG</a> naar albums</p>";

?>
