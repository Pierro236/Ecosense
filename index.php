<?php

session_start();
if (isset($_SESSION['user_first_name'])) { //if login in session is not set
    header("Location: php/home.php");
}
?>

<?php

include 'php\config.php';

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
    </div>


    <div id="container">





        <form id="login" action="php/connexion.php" method="POST">

            <div id="headerform">
                <p class="name"><?php echo $lang['Login']; ?></p>
                <img src="img/logo.png" alt="logo" class="logo">


            </div>




            <label><b><?php echo $lang['username']; ?></b></label>

            <input type="text" placeholder=<?php echo $lang['enterid']; ?> name="email" id="email" required>




            <label><b><?php echo $lang['mdp']; ?></b></label>
            <input type="password" placeholder=<?php echo $lang['enterpw']; ?> name="password" id="password" required>
            <p style="color:red; font-size:20px;">
                <?php if (isset($_SESSION['mess'])) {
                    echo $_SESSION['mess'];
                    unset($_SESSION['mess']);
                } ?></p>

            <input type="submit" name="Btncx" id="formlogin" value=<?php echo $lang['connect']; ?>>

        </form>



    </div>


    <div class="footer">
        <div class="contain">

            <div class="col">
                <a style="text-decoration:none" href="php\FAQ.php">
                    <h1>FAQ</h1>
                </a>

            </div>
            <div class="col">
                <a href="php\CGU.html" style="text-decoration:none">
                    <h1><?php echo $lang['CGU']; ?></h1>
                </a>

            </div>

        </div>
        <div class="col">
            <a style="text-decoration:none" href="mailto:pierre.sedo@eleve.isep.fr, robin.lerda@eleve.isep.fr, julien.godfroy@eleve.isep.fr, francois.hascoat@eleve.isep.fr,timothe.bonnel@eleve.isep.fr, gabriel.hercaud@eleve.isep.fr">
                <h1>contact@ecosense.com</h1>
            </a>

        </div>


    </div>
    </div>


    <script type="text/javascript" id="cookiebanner" src="https://cdnjs.cloudflare.com/ajax/libs/cookie-banner/1.0.0/cookiebanner.min.js" data-position="top" data-fg="#ffffff" data-bg="#3c546b" data-link="#99011e" data-moreinfo="https://www.cookiechoices.org/" data-message="Les cookies assurent le bon fonctionnement de notre site Internet. En utilisant ce dernier, vous acceptez leur utilisation." data-linkmsg="En savoir plus"></script>

    <script src="http://www.example.com/cookiechoices.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function(event) {
            cookieChoices.showCookieConsentBar('Ce site utilise des cookies pour vous offrir le meilleur service. En poursuivant votre navigation, vous acceptez l’utilisation des cookies.', 'J’accepte', 'En savoir plus', 'http://www.example.com/mentions-legales/');
        });
    </script>

</body>






</html>