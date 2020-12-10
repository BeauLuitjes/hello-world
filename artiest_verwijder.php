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
    $Naam = mysqli_fetch_array($resultaat);
    ?>
    <p>wilt u de volgende artiest verwijderen?</p>
    <form name="form1" method="post" action="artiest_verwijder_verwerk.php">
        <input type="hidden" name="ID_artiest" value="<?php echo $Naam['ID_artiest'] ?>">
        <p>Naam:
            <input type="text" name="Naam" value="<?php echo $Naam['Naam'] ?>" disabled/></p>
        <p>Instrument:
            <input type="text" name="Instrument" value="<?php echo $Naam['Instrument'] ?>" disabled/></p>
        <p>Geboortedatum:
            <input type="text" name="Geboortedatum" value="<?php echo $Naam['Geboortedatum'] ?>" disabled/></p>
        <input type="submit" name="verwijderknop" onclick="connectDB()" value="verwijderen">
        <p><a href="artiest_uitlees.php">terug naar overzicht</a> </p>
        </table>
    </form>
    <?php
}
?>