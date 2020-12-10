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
<h2>Voeg en band toe:</h2>
<form method="post" action="band_toevoeg_verwerk.php" name="formulier">
    <table>
        Bandnaam:<input type="text" id="Bandnaam" name="Naam" required><br>
        Land van herkomst:<input type="text" id="Land" name="Land" maxlength="30"><br>
        Aantal leden:<input type="text" id="Aantalleden" name="Aantalleden"><br>
        Soort muziek:<input type="text" id="Muzieksoort" name="Muzieksoort"><br>
        Algemene info<textarea id="Info" name="Info" rows="6" cols="20"></textarea><br>
        <input type="submit" name="toevoegKnop" onclick="connectDB()">
    </table>
</form>
</body>
</html>