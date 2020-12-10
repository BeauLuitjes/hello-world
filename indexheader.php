<!DOCTYPE html>
<html>
<head>
    <link href="styleheader.css" type="text/css" rel="stylesheet">
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
        echo "<p>Welkom, " . $_SESSION['Gebruikersnaam'] . " u bent ingelogd!</p>";

        if ($_SESSION['Level'] == 0)
        {
            echo "<p>U heeft geen rechten om deze pagina te bekijken</p>";
            echo "<p><a href='uitlog.php'>Log uit!</a></p>";
            exit ();
        }
    }
    ?>
</header>

</body>
</html>