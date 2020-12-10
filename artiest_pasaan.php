<?php
include "header.php";

require 'config.php';
$userID = $_GET['id'];
$query = "SELECT * FROM back13_artiesten WHERE ID_artiest = " . $userID;
$resultaat = mysqli_query($mysqli, $query);
if (mysqli_num_rows($resultaat) == 0)
{
    echo "<p>Er is geen user met ID $userID.</p>";
}
else {
    $rij = mysqli_fetch_array($resultaat);
    ?>


    <form method="post" action="artiest_pasaan_verwerk.php" name="formulier">
        <table>
            ID artiest:<input type="number" id="ID_artiest" name="ID_artiest" readonly value="<?php echo $rij['ID_artiest'] ?>"" ><br>
            Artiestennnaam:<input type="text" id="Naam" name="Naam" value="<?php echo $rij['Naam'] ?>"" ><br>
            Instrument<input type="text" id="Instrument" name="Instrument" value="<?php echo $rij['Instrument'] ?>"" ><br>
            Geboortedatum:<input type="date"  id="ArtiestDatum" name="Geboortedatum" value="<?php echo $rij['Geboortedatum'] ?>"" ><br>
            Geslacht<input type="text" id="Geslacht" name="Geslacht" value="<?php echo $rij['Geslacht'] ?>"" ><br>            Info:<input type="text" id="Info" name="Info" value="Info" ><br>
            Band:<select name="Band">
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
            <p><input type="submit" name="WijzigKnop" onclick="connectDB()"></p>
            <a href="artiest_uitlees.php">Overzicht</a>
        </table>
    </form>
    <?php
}
?>