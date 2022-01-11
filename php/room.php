<?php

include 'config.php';

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
    <link rel="stylesheet" href="../css/room.css" />
    <link rel="icon" type="image/jpg" href="" />
    <link rel="stylesheet" href="../css/navbar.css" />
</head>

<body>


    <div class="navbar"> 
        <img  class="ilog" src="../img/logo.png" alt="logo" />
        <a class="ES"> EcoSense</a>
        <a class="home" href = "home.php">Accueil</a>
        <a class="name" href = "profile.php">Nom</a>

    </div>


    <div class="wrap">

    </div>

    <form method="GET" action="">
        <select id="lang" name="lang">
            <option value="fr">Francais</option>
            <option value="en">English</option>
        </select>
        <input type="submit" value="Envoyer">
    </form>

    <h1 class="bvn">
        Bienvenue dans la salle 1
    </h1>


    <div class="align">
        <div class="score">
            <div class="titre">
                Score de la salle 
            </div> 
            <img class="score1" src="../img/diagramme-circulaire.png" alt="">
        </div>

        <div class="score2">
            <div class="texte">
                <p>Equitis Romani autem esse filium criminis loco poni ab accusatoribus neque his iudicantibus oportuit neque defendentibus nobis. Nam quod de pietate dixistis, est quidem ista nostra existimatio, sed iudicium certe parentis; quid nos opinemur, audietis ex iuratis; quid parentes sentiant, lacrimae matris incredibilisque maeror, squalor patris et haec praesens maestitia, quam cernitis, luctusque declarat.</p>
            </div>
            
        </div>
    </div>
         

    <div class="align2">
        <div class="sound">
            <div class="titre">
                Niveau sonore
            </div> 
            <img class="sound1" src="../img/les-ondes-sonores.png" alt="">
        </div>

        <div class="cod">
            <div class="titre">
                Taux de CO2
            </div>
            <img class="cod2" src="../img/qualite-de-lair.png" alt="">
        </div>
    </div>



    <footer>

    </footer>

</body>

</html>
