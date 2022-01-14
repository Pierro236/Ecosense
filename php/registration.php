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


        <form id="registration" action="" method="POST">
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

        <?php
        if ($_POST) {
            function createpassword($nbChar)
            {
                return substr(str_shuffle(
                    'abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789'
                ), 1, $nbChar);
            }
            $user_password = createpassword(8);

            extract($_POST);

            $user_last_name = $_POST['user_last_name'];
            $user_first_name = $_POST['user_first_name'];
            $user_email = $_POST['user_email'];
            $options = [
                'cost' => 12,
            ];
            $hash_pass = password_hash($user_password, PASSWORD_BCRYPT, $options);

            include 'config.php';
            global $db;



            $c = $db->prepare("SELECT user_email FROM utilisateur WHERE user_email = :user_email");
            $c->execute(['user_email' => $user_email]);
            $result = $c->rowCount();
            if ($result == 0) {
                $q = $db->prepare(" INSERT INTO  utilisateur(user_first_name,user_last_name,user_email,user_password) VALUES(:user_first_name, :user_last_name, :user_email, :user_password)");
                $q->execute([
                    'user_first_name' => $user_first_name,
                    'user_last_name' => $user_last_name,
                    'user_email' => $user_email,
                    'user_password' => $hash_pass
                ]);
                //envoi du mail
                $header = "MIME-Version: 1.0\r\n";
                $header .= 'From:"EcoSense"<ecosense.contact@gmail.com>' . "\n";
                $header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
                $header .= 'Content-Transfer-Encoding: 8bit';

                $message = '
                    <html>
                        <body>
                            <div >
                                Bonjour ' . $user_last_name . ' <br /><br />Bienvenue sur EcoSense.
                                <br /><br />
                                Un compte EcoSense vous a été créé.
                                Pour y accéder, veuillez renseigner les identifiants suivants:<br />
                                Identifiant : ' . $user_email . '<br />
                                Mot de passe : ' . $user_password . '
                                <br />
                                
                            </div>
                        </body>
                    </html>
                ';

                mail($user_email, "Bienvenu sur Ecosense !", $message, $header);
                echo "<p style='color:green;'>" ."Le compte a bien était créé" ."</p>";
            } else {
                echo "<p style='color:red;'>" ."Cet Email est déjà utilisé !" ."</p>";
            }
        }
        ?>
    </div>
    <footer>

    </footer>

</body>

</html>
