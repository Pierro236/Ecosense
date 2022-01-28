<?php
session_start();
if ($_SESSION['role'] != 'admin') { //if login in session is not set
    header("Location: home.php");
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


?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>EcoSense | Accueil</title>
    <link rel="stylesheet" href="../css/registration.css" />
    <link rel="icon" type="image/jpg" href="" />
    <link rel="stylesheet" href="../css/navbar.css" />
    <link rel="stylesheet" href="../css/footer.css" />
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
                <p class="name">Création d'un compte</p>
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

        <form id="registration" action="rmroom.php" method="POST">
            <div id="headerform">
                <p class="name">Supprimer une salle</p>
                <img src="../img/logo.png" alt="logo" class="logo">
            </div>

            <label><b>Nom de la salle</b></label>
            <select name="room_to_remove" id="room_to_remove">
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

            <input type="submit" name="rmroom" onclick="alert('La salle ça bien été supprimée')" value='Supprimer une salle' id="rmroom">
        </form>

        <form id="registration" action="rmuser.php" method="POST">
            <div id="headerform">
                <p class="name">Supprimer un utilisateur</p>
                <img src="../img/logo.png" alt="logo" class="logo">
            </div>

            <label><b>Adresse mail de l'utilisateur</b></label>
            <select name="user_to_remove" id="user_to_remove">
                <option value=""> Sélectionnez un utilisateur </option>
                <?php
                $sql = $db->prepare('SELECT user_email FROM utilisateur WHERE id_role != 0');
                $sql->execute();
                $utilisateurs = $sql->fetchAll(PDO::FETCH_COLUMN);
                for ($i = 0; $i < count($utilisateurs) - 1; $i++) {
                    echo '<option value="' . $utilisateurs[$i] . '">' . $utilisateurs[$i] . '</option>';
                }
                ?>
            </select>

            <input type="submit" name="rmroom" onclick="alert('Utilisateur  supprimé')" value='Supprimer un utilisateur' id="rmroom">


        </form>




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