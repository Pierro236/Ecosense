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

    <div style="padding-left: 100px; padding-top: 50px;  ">

        <ul>
            <li style=" color:black; text-align:left; font-size: 30px;padding-top: 30px;">
                <p>Comment me connecter à mon espace personnel?</p>
            </li>
            <p>Vos identifiants de connexion vous seront communiqués dans un délai de 3 jours suivant votre prise de fonction.</p>
            <li style="color:black; text-align:left; font-size: 30px;padding-top: 30px;">
                <p>Comment accéder à ma fréquence cardiaque?</p>
            </li>
            <p>Vous pouvez accéder à votre fréquence cardiaque en temps réel sur votre montre et/ou en ligne sur le site en cliquant sur votre nom.</p>
            <li style="color:black; text-align:left; font-size: 30px;padding-top: 30px;">
                <p>Comment nous contacter ?</p>
            </li>
            <p>Vous pouvez nous contacter en cliquant sur le lien "CONT@CT ECOSENSE" présent au bas de la page d'acceuil et de l'espace détente.</p>

        </ul>

        <form id="login" action="faqtraitement.php" method="POST">

            <label style="color:black; text-align:left; font-size: 30px;">D'autres questions?Contactez-nous!</label><br>
            <textarea id="message" style="width: 50%;height: 200px;" placeholder="Votre message" name="message"></textarea><br>
            <input type="submit" name="me" id="formlogin" style="color:#53af57; text-align:left; font-size: 30px;" value="Envoyer">
        </form>
        <p style="color:#53af57; text-align:left; font-size: 30px;"><?php if (isset($_SESSION['envoie'])) {
                                                                        echo $_SESSION['envoie'];
                                                                    } ?></p>
    </div>




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