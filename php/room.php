<?php
session_start();
if (!isset($_SESSION['user_first_name'])) { //if login in session is not set
    header("Location: ../index.php");
}
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




extract($_POST);

$room_selected = $_POST['roomselect']; //recuperele nom de la salle

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
        <img class="ilog" src="../img/logo.png" alt="logo" />
        <a class="ES"> EcoSense</a>
        <a class="home" href="home.php">Accueil</a>
        <?php
        if ($_SESSION['role'] == 'user') {
            echo '      
                <a class="name" href="profile.php">' . $_SESSION['user_first_name'] . '</a>
                ';
        }

        if ($_SESSION['role'] == 'admin') {
            echo '      
                <a class="home" href="registration.php">Administration</a>
                ';
        }
        ?>
        <a href="logout.php" class="home">Déconnecter</a>

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
        <?php
        echo '
        Bienvenue dans la salle ' . $room_selected . ''
        ?>
    </h1>


    <div class="align">
        <div class="score">
            <div class="titre">
                Score de la salle
            </div>
            <img class="score1" src="../img/diagramme-circulaire.png" alt="">
            <div class="description1">
                <p>Le score de la salle est: 70/100</p>
            </div>
        </div>

        <div class="score2">
            <div class="texte">
                <p>Aujourdhui la salle est particulièrement poluée dû au taux de gaz carbonique élevé. La temperature est 2°C supérieure à la moyenne, nous vous conseillons d'aérer. Le niveau sonore est lui conforme aux normes de 62dB. </p>
            </div>

        </div>
    </div>


    <div class="align2">
        <div class="sound">
            <div class="titre">
                Niveau sonore
            </div>
            <img class="sound1" src="../img/les-ondes-sonores.png" alt="">
            <div>
                <p class="description2">Le niveau sonore actuel de la salle est: 62dB</p>
            </div>
        </div>

        <div class="cod">
            <div class="titre">
                Taux de CO2
            </div>
            <img class="cod2" src="../img/qualite-de-lair.png" alt="">
            <div>
                <p class="description3">Le taux de CO2 actuel dans la salle est de: 850 ppm </p>
            </div>
        </div>
    </div>


    <div class="footer">
        <div class="contain">

            <div class="col">
                <a style="text-decoration:none" href="FAQ.html">
                    <h1>FAQ</h1>
                </a>

            </div>
            <div class="col">
                <a style="text-decoration:none" href="CGU.html">
                    <h1>CGU</h1>
                </a>

            </div>

            <div class="col">
                <a style="text-decoration:none" href="mailto:pierre.sedo@eleve.isep.fr, robin.lerda@eleve.isep.fr, julien.godfroy@eleve.isep.fr, francois.hascoat@eleve.isep.fr,timothe.bonnel@eleve.isep.fr, gabriel.hercaud@eleve.isep.fr">
                    <h1>contact@ecosense.com</h1>
                </a>

            </div>


        </div>
    </div>

</body>


</html>