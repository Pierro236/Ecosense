<?php

include 'config/config.php';

if (isset($_GET['lang']) && !empty($_GET['lang'])) {
    if (file_exists('lang/' . $_GET['lang'] . '.php'))
        require_once('lang/' . htmlentities($_GET['lang']) . '.php');
    else
        require_once('lang/fr.php');
} /*else if (file_exists('lang/' . $_SERVEUR['HTTP_ACCEPT_LANGUAGE'] . '.php')) {
    require_once('lang/' . htmlentities($_SERVEUR['HTTP_ACCEPT_LANGUAGE']) . '.php');
}*/ else {
    require_once('lang/fr.php');
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
    <link rel="stylesheet" href="css/style_main.css" />
    <link rel="icon" type="image/jpg" href="" />
</head>

<body>

    <div>
        <form method="GET" action="">
            <select id="lang" name="lang">
                <option value="fr">Francais</option>
                <option value="en">English</option>
            </select>
            <input type="submit" value="Envoyer">
        </form>

        <h1><?php echo $lang['title']; ?></h1>
    </div>


    <div id="container">


        <form id="login" action="php/home.php" method="POST">
            <div id="headerform">
                <p><?php echo $lang['Login']; ?></p>
                <img src="img/logo.png" alt="logo">


            </div>

            <label><b>Identifiant</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

            <label><b><?php echo $lang['mdp']; ?></b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>

            <input type="submit" name="Btncx" value='Connexion'>

        </form>

    </div>
    <div>
        <footer>
            <h2 class="CGU">conditions générales d'utilisation</h2>
        </footer>
    </div>



</body>




</html>