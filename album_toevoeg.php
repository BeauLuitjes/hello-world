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
<h2>Album toevoegen</h2>
<form name="form1" method="post" action="album_toevoeg_verwerk.php" enctype="multipart/form-data">
    <table>
        <label for="Titel">Titel: </label> <input type="text" name="Titel" required><br>

        Band:<select name="Band" required>
            <?php
            require ('config.php');
            $opdracht = "SELECT * FROM back12_bands";
            $resultaat = mysqli_query($mysqli, $opdracht);
            While ($band = mysqli_fetch_array($resultaat))
            {
                echo "<option value='" . $band['Naam'] . "'>";
                echo $band['Naam'];
                echo "</options>";
            }
            ?>
        </select><br>

        <label for="Jaar">Jaar: </label> <input type="text" name="Jaar" required><br>
        <label for="Info">Info </label> <textarea name="Info" rows="4" cols="50"></textarea><br>
        <label for="Afbeelding">Afbeelding:</label> <input type="file" name="AfbeeldingVeld"><br>

        <input type="submit" name="toevoegKnop" value="UPLOAD" onclick="connectDB()">
    </table>
</form>
</body>
</html>