<!DOCTYPE html>
<html>
<head>
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
<header>
    <h1>Mijn applicatie</h1>
    <?php
    session_start();

    if(!isset($_SESSION['Gebruikersnaam']))
    {
        header("location:inlog.php");
    }

    else
    {
        echo "<p>Welkom, " . $_SESSION['Gebruikersnaam'] . "</p>";

        if ($_SESSION['Level'] == 0)
        {
            echo "<p>U heeft geen rechten om deze pagina te bekijken</p>";
            echo "<p><a href='uitlog.php'>Log uit!</a></p>";
            exit ();
        }
    }
    ?>
</header>
<nav>
    <ul>
        <li><a href="band_uitlees.php">Naar bands</a></li>
        <li><a href="artiest_uitlees.php">Naar artiesten</a></li>
        <li><a href="album_uitlees.php">Naar albums</a></li>
        <li><a href="band_toevoeg.php">Band toevoegen</a></li>
        <li><a href="artiest_toevoeg.php">Artiest toevoegen</a></li>
        <li><a href="album_toevoeg.php">Albums toevoegen</a></li>
        <li><a href="uitlog.php">Uitloggen</a></li>
    </ul>
</nav>
</body>
</html>
