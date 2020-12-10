<?php
    session_start();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<script src="https://www.google.com/recaptcha/api.js"></script>

<body>
<?php
if (isset($_POST['inlog']))
{
    include 'indexheader.php';
    require 'config.php';

    $Gebruikersnaam = $_POST['Gebruikersnaam'];
    $Wachtwoord = sha1($_POST['Wachtwoord']);

    $query = "SELECT * FROM back12_users
                 WHERE Gebruikersnaam = '$Gebruikersnaam'
                 AND Wachtwoord = '$Wachtwoord'";

    $resultaat = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($resultaat) > 0)
    {

        $user = mysqli_fetch_array($resultaat);

        $_SESSION['Gebruikersnaam'] = $user['Gebruikersnaam'];
        $_SESSION['Level']          = $user['Level'];
        echo "<p><a href='index.php'>Ga verder</a></p>";
    }

    else
    {
        echo "<p>Naam en/of wachtwoord zijn onjuist.</p>";
        echo "<p><a href='inlog.php'>Probeer opnieuw</a></p>";
    }
}
else {

    $sender_name = stripslashes($_POST["sender_name"]);
    $sender_email = stripslashes($_POST["sender_email"]);
    $sender_message = stripslashes($_POST["sender_message"]);
    $response = $_POST["g-recaptcha-response"];

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => '6LfuGuIZAAAAAMlzt0WuYfO5AQrT_SUCCdKSFmDY',
        'response' => $_POST["g-recaptcha-response"]
    );
    $options = array(
        'http' => array(
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success = json_decode($verify);

    if ($captcha_success->success == false) {
        echo "<p>You are a bot! Go away!</p>";
    } else if ($captcha_success->success == true) {
        echo "<p>You are not not a bot!</p>";
    }
    ?>

    <h2>LOG IN:</h2>
    <form action="ReCaptcha.php" method="post" enctype="multipart/form-data">
        <table border="0">
        <tr>
            <td>Gebruikersnaam</td>
            <td><input type="text" name="Gebruikersnaam"></td>
        </tr>
        <tr>
            <td>Wachtwoord</td>
            <td><input type="password" name="Wachtwoord"></td>
        </tr>
        <tr>
            <td>$nbsp;</td>
            <td><input type="submit" name="inlog" value="LOG IN"></td>
        </tr>
    </table>
    <div class="captcha_wrapper">
        <div class="g-recaptcha" data-sitekey="6LfuGuIZAAAAAPYp3djIJjftIBmn0hCDrHVhClwH"></div>
    </div>
    </form>
    <form action="ReCaptcha.php" method="post" enctype="multipart/form-data">
        <input name="sender_name" placeholder="Your Name..."/><br>
        <input name="sender_email" placeholder="Your email..."/><br>
        <textarea placeholder="Your Message..." name="sender_message"></textarea><br>
        <div class="captcha_wrapper">
            <div class="g-recaptcha" data-sitekey="6LfuGuIZAAAAAPYp3djIJjftIBmn0hCDrHVhClwH"></div>
        </div>
        <button type="submit" id="send_message">Send Message!</button>


    </form>
    <?php
}
?>
</body>
</html>
