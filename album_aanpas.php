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
    $rij = mysqli_fetch_array($resultaat);
    ?>


    <form name="form1" method="post" action="album_aanpas_verwerk.php" enctype="multipart/form-data">
        <table>
            ID album:<input type="number" id="ID_album" name="ID_album" readonly value="<?php echo $rij['ID_album'] ?>"" ><br>
            Titel:<input type="text" id="Titel" name="Titel" value="<?php echo $rij['Titel'] ?>"" ><br>
            <select name="Band">
                <?php
                require ('config.php');
                $opdracht = "SELECT * FROM back12_bands";
                $resultaat = mysqli_query($mysqli, $opdracht);
                While ($band = mysqli_fetch_array($resultaat))
                {
                    echo "<option value='" . $band['ID_band'] . "'>";
                    echo $band['Naam'];
                    echo "</options>";
                }
                ?>
            </select><br>
            Jaar:<input type="text"  id="Jaar" name="Jaar" value="<?php echo $rij['Jaar'] ?>"" ><br>
            Info<input type="text" id="Info" name="Info" value="<?php echo $rij['Info'] ?>"" ><br>
            Afbeelding<input type="file" name="Afbeelding" value="<?php echo $rij['Afbeelding'] ?>""  ><br>
            <p><input type="submit" name="WijzigKnop" onclick="connectDB()"></p>
            <a href="album_uitlees.php">Overzicht</a>
        </table>
    </form>
    <?php
}
?>
