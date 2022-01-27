<?php
session_start();
if ($_SESSION['role'] != 'user') { //if login in session is not set
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


?>



<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>EcoSense | Accueil</title>
    <link rel="stylesheet" href="../css/profile.css" />
    <link rel="icon" type="image/jpg" href="" />
    <link rel="stylesheet" href="../css/navbar.css" />

    <style>
        button {
            position: relative;
            top: 600px;
            display: inline-block;
            background-color: #77C3DC;
            border-radius: 30px;
            border: 4px double #cccccc;
            color: #eeeeee;
            text-align: center;
            font-size: 28px;
            padding: 20px;
            width: 200px;
            height: 99px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
            left: 50px;

        }

        button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        button span:after {
            content: '\00bb';
            position: relative;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        button:hover {
            background-color: #FFFFFF;
        }

        button:hover span {
            padding-right: 25px;
        }

        button:hover span:after {
            opacity: 1;
            right: 0;
        }
    </style>
</head>

<body>


    <div class="navbar">
        <div class="ilog">
            <img src="../img/logo.png" alt="logo" />
        </div>

        <a class="ES"> EcoSense</a>
        <a href="home.php" class="home">Accueil</a>
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
        <input type="submit" value="Changer la langue">
    </form>
    <h1 style="text-align:center;" class="titre">
        <br><br>Ma fréquence cardiaque
    </h1>

    <div class="cardio">
        <h2 style="text-align:center"> Rythme cardiaque </h2>
        <img class="heart" src="../img/heart.png" alt="heart" />


       <div  class="aff">
           <?php
                function nbr() {

                    $nombre = random_int(60, 75);
                    echo $nombre;
                };
                 nbr();

           ?>
        </div>
    </div>
    <div class="cons">
        <h2 style="text-align:left" class="texte">&nbsp; Votre fréquence cardiaque est plutôt élevée <br>
            &nbsp; Vous pouvez accéder à vos statisques <br>&nbsp; ainsi qu'à l'espace détente plus bas...</h2>
    </div>

    <h1 class="stat">
        <br><br><br><br><br><br><br><br><br><br><br><br><br>Mes Statistiques
    </h1>

    <img class="graph1" src="../img/graph1.png" alt="graph1">

    <img class="graph2" src="../img/graph2.png" alt="graph2">



    <a href="playful.php"><button style="text-align:center;">
            <span>Relaxez-vous<br></span>
        </button>
    </a>

    <div class="footer">
        <div class="contain">

            <div class="col">
                <a style="text-decoration:none" href="FAQ.php">
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
            <div class="col">
                <a style="text-decoration:none" href="resetpw.php">
                    <h1>Modifiez votre mot de passe</h1>
                </a>

            </div>


        </div>
    </div>

</body>



</html>
