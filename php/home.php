<?php
session_start();
if (!isset($_SESSION['user_first_name'])) { //if login in session is not set
    header("Location: ../index.php");
}
?>
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
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/navbar.css" />
    <link rel="icon" type="image/jpg" href="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />




</head>

<body>


    <div class="navbar">
        <img class="ilog" src="../img/logo.png" alt="logo" />
        <a href="home.php"> <img class="ht" src="../img/heart.png" width="10%" /></a>
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
        <div class="search">
            <form id="roomselect" action="room.php" method="POST">
                <select name="roomselect" id="roomselect">
                    <option value=""> Sélectionnez une salle </option>

                    <?php
                    $sql = $db->prepare('SELECT room_name FROM room');
                    $sql->execute();
                    $rooms = $sql->fetchAll(PDO::FETCH_COLUMN);
                    for ($i = 0; $i < count($rooms); $i++) {
                        echo '<option value="' . $rooms[$i] . '">' . $rooms[$i] . '</option>';
                    }
                    ?>

                </select>
                <input type="submit" name="btnvalidate" value='Valider' id="btnvalidate">
            </form>

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
                <a style="text-decoration:none" href="FAQ.php">
                    <h1>FAQ</h1>
                </a>

            </div>
            <div class="col">
                <a style="text-decoration:none" href="CGU.php">
                    <h1>CGU</h1>
                </a>

            </div>

            <div class="col">
                <a style="text-decoration:none" href="mailto:pierre.sedo@eleve.isep.fr, robin.lerda@eleve.isep.fr, julien.godfroy@eleve.isep.fr, francois.hascoat@eleve.isep.fr,timothe.bonnel@eleve.isep.fr, gabriel.hercaud@eleve.isep.fr">
                    <h1>contact@ecosense.com</h1>
                </a>

            </div>

            <div class="col">
                <a style="text-decoration:none" href="resetpw.php">
                    <h1>Modifiez votre mot de passe</h1>
                </a>

            </div>


        </div>
    </div>
</body>



</html>