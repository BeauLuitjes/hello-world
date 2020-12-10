<?php
include "header.php";

require 'config.php';
$userID = $_GET['id'];
$query = "SELECT * FROM back13_albums WHERE ID_album = " . $userID;
$resultaat = mysqli_query($mysqli, $query);
if (mysqli_num_rows($resultaat) == 0)
{
    echo "<p>Er is geen user met ID $userID.</p>";
}
else {
    $Naam = mysqli_fetch_array($resultaat);
    ?>
    <p>wilt u de volgende album verwijderen?</p>
    <form name="form1" method="post" action="album_verwijder_verwerk.php">
        <input type="hidden" name="ID_album" value="<?php echo $Naam['ID_album'] ?>">
        <p>Titel:
            <input type="text" name="Titel" value="<?php echo $Naam['Titel'] ?>" disabled/></p>
        <p>Jaar
            <input type="text" name="Jaar" value="<?php echo $Naam['Jaar'] ?>" disabled/></p>
        <p>Info:
            <input type="text" name="Info" value="<?php echo $Naam['Info'] ?>" disabled/></p>
        <input type="submit" name="verwijderknop" onclick="connectDB()" value="verwijderen">
        <p><a href="artiest_uitlees.php">terug naar overzicht</a> </p>
        </table>
    </form>
    <?php
}
?>