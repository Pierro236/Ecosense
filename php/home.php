<?php

include '../config/config.php';

if (isset($_GET['lang']) && !empty($_GET['lang'])) {
    if (file_exists('lang/' . $_GET['lang'] . '.php'))
        require_once('lang/' . htmlentities($_GET['lang']) . '.php');
    else
        require_once('../lang/fr.php');
} /*else if (file_exists('lang/' . $_SERVEUR['HTTP_ACCEPT_LANGUAGE'] . '.php')) {
    require_once('lang/' . htmlentities($_SERVEUR['HTTP_ACCEPT_LANGUAGE']) . '.php');
}*/ else {
    require_once('../lang/fr.php');
}

if ($_GET) {
    $_GET['lang'] = $_GET['lang'];


    /*if (!empty($num) and !empty($destination)) {
        $db->exec("INSERT INTO table_base(num,destination) VALUES ('$num','$destination')");
    } else echo "<strong>Un ou plusieurs champs n'ont pas été renseignés. Réessayez en remplissant l'entièreté du formulaire.</strong>";*/
}


?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>EcoSense | Accueil</title>
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/navbar.css" />
    <link rel="icon" type="image/jpg" href="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />




</head>

<body>


    <div class="navbar">
        <img src="../img/logo.png" alt="logo" />
        <a class="ES" href="home.php"> <img src="../img/heart.png" width="10%" /></a>
        <a class="home" href="home.php">Accueil</a>
        <a class="name" href="profile.php">Mon profil</a>

    </div>


    <div class="wrap">
        <div class="search">
            <input type="text" class="searchTerm" placeholder="Recherchez une salle">
            <a class="searchButton" href="room.php"><img class="photo" src="../img/loupe.png" /></a>
        </div>
    </div>

    <form method="GET" action="">
        <select id="lang" name="lang">
            <option value="fr">Francais</option>
            <option value="en">English</option>
        </select>
        <input type="submit" value="Envoyer">
    </form>

    <div class="footer">
        <div class="contain">

            <div class="col">
                <h1>FAQ</h1>

            </div>
            <div class="col">
                <h1>CGU</h1>

            </div>
            <div class="col">
                <h1>mentions légales</h1>

            </div>
            <div class="col">
                <h1>contact@ecosense.com</h1>

            </div>


        </div>
    </div>
</body>



</html>