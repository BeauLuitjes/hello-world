<?php
include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h2>Artiest toevoegen</h2>
<form method="post" action="artiest_toevoeg_verwerk.php" name="formulier">
    <table>
        Artiestennnaam:<input type="text" id="Artiestnaam" name="Naam" ><br>
        Instrument<input type="text" id="Instrument" name="Instrument" ><br>
        Geboortedatum:<input type="date"  id="ArtiestDatum" name="Geboortedatum" ><br>
        Geslacht:<input type="radio" name="Geslacht" value="man">man<input type="radio" name="Geslacht" value="vrouw">vrouw<br>
        Info:<input type="text" id="Info" name="Info" ><br>
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
        <p><input type="submit" name="toevoegKnop" onclick="connectDB()"></p>
    </table>
</form>
</body>
</html>