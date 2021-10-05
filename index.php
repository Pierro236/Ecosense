<?php

include 'php/config.php';

if (isset($_POST['lang']) && !empty($_POST['lang'])) {
    if (file_exists('lang/' . $_POST['lang'] . '.php'))
        require_once('lang/' . htmlentities($_POST['lang']) . '.php');
    else
        require_once('lang/fr.php');
} /*else if (file_exists('lang/' . $_SERVEUR['HTTP_ACCEPT_LANGUAGE'] . '.php')) {
    require_once('lang/' . htmlentities($_SERVEUR['HTTP_ACCEPT_LANGUAGE']) . '.php');
}*/ else {
    require_once('lang/fr.php');
}

if ($_POST) {
    $_POST['lang'] = $_POST['lang'];


    /*if (!empty($num) and !empty($destination)) {
        $db->exec("INSERT INTO table_base(num,destination) VALUES ('$num','$destination')");
    } else echo "<strong>Un ou plusieurs champs n'ont pas été renseignés. Réessayez en remplissant l'entièreté du formulaire.</strong>";*/
}


?>



<!DOCTYPE html>
<html>

<head>
    <?php /*if ($_GET['lang'] == 'fr') {
        echo '<link href="css/style_main.css" rel="stylesheet" type="text/css" media="screen">';
    } elseif ($_GET['lang'] == 'en') {
        echo '<link href="css/style_main.css" rel="stylesheet" type="text/css" media="screen">';
    } elseif ($_GET['lang'] == 'de') {
        echo '<link href="css/style_main.css" rel="stylesheet" type="text/css" media="screen">';
    } else echo '<link href="css/style_main.css" rel="stylesheet" type="text/css" media="screen">';
    */ ?>
    <meta charset="utf-8" />
    <title>EcoSense | Accueil</title>
    <link rel="stylesheet" href="css/style_main.css" />
    <link rel="icon" type="image/jpg" href="" />
</head>

<body>
    <div>
        <form method="POST" action="">
            <select id="lang" name="lang">
                <option value="fr">Francais</option>
                <option value="en">English</option>
            </select>
            <input type="submit" value="Envoyer">
        </form>

        <h1><?php echo $lang['title']; ?></h1>
    </div>
</body>

</html>