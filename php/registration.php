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
    <link rel="stylesheet" href="../css/registration.css" />
    <link rel="icon" type="image/jpg" href="" />
    <link rel="stylesheet" href="../css/navbar.css" />
</head>

<body>


    <div class="navbar">
        <img class="ilog" src="../img/logo.png" alt="logo" />
        <a class="ES"> EcoSense</a>
        <a class="home">Accueil</a>
        <a class="name">Nom</a>

    </div>




    <form method="GET" action="">
        <select id="lang" name="lang">
            <option value="fr">Francais</option>
            <option value="en">English</option>
        </select>
        <input type="submit" value="Envoyer">
    </form>

    <div id="container">


        <form id="registration" action="adduser.php" method="POST">
            <div id="headerform">
                <p class="name"><?php echo $lang['Login']; ?></p>
                <img src="../img/logo.png" alt="logo" class="logo">


            </div>

            <label><b>Nom</b></label>
            <input type="text" placeholder="Nom du nouvel utilisateur" name="user_last_name" id="user_last_name" required>
            <label><b>Prénom</b></label>
            <input type="text" placeholder="Prénom du nouvel utilisateur" name="user_first_name" id="user_first_name" required>
            <label><b>Adresse mail</b></label>
            <input type="text" placeholder="Adresse mail du nouvel utilisateur" name="user_email" id="user_email" required>

            <input type="submit" name="Btncx" onclick="alert('Le compte a bien été créer, l\'utilisateur recevra un mail avec ses identifiants ! ')" value='Générer un compte' id="password">


        </form>
        <form id="registration" action="addsalle.php" method="POST">
            <div id="headerform">
                <p class="name">Ajouter une salle</p>
                <img src="../img/logo.png" alt="logo" class="logo">
            </div>

            <label><b>Nom de la salle</b></label>
            <input type="text" placeholder="Nom de la salle à ajouter" name="room_name" id="room_name" required>

            <input type="submit" name="addsalle" onclick="alert('La salle ça bien été ajoutée')" value='Ajouter une salle' id="addroom">


        </form>


    </div>

</body>

</html>