<?php

include '../config/config.php';

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
        <img src="../img/logo.png" alt="logo" />
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
            <input type="text" placeholder="Nom du nouvel utilisateur" name="surname" id="surname"required>
            <label><b>Prénom</b></label>
            <input type="text" placeholder="Prénom du nouvel utilisateur" name="name" id="name" required>
            <label><b>Adresse mail</b></label>
            <input type="text" placeholder="Adresse mail du nouvel utilisateur" name="email" id="email"required>

            <input type="submit" name="Btncx" onclick="creatpassword" value='Générer un compte' id="password">
        
            <script>
            function creatpassword($nbChar)
	{
		return substr(str_shuffle(
			'abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789'
		), 1, $nbChar);
	}
            </script>
        </form>
        
        <?php
        

        extract($_POST);

        $options = [
            'cost' => 12,
        ];
        $hash_pass = password_hash($password, PASSWORD_BCRYPT, $options);
        
        include '../config/config.php';
        global $db;


        //$c = $db->prepare("SELECT email FROM users WHERE email = :email")
        //$c->execute(['email' => $email]);
        //$result = $c->rowCount();

        //if($result == 0){
            $q = $db->prepare(" INSERT INTO  users(surname,name,email,password) VALUES(:surname, :name, :email, :password)");
            $q->execute([
                'surname' => $surname,
                'name' => $name,
                'email' => $email,
                'password' => $hash_pass
                    ]);
                   // echo "Le compte a bien été créé.";
            //}else{
            //   echo "Cet Email est déjà utilisé !";
            //    }
        
        ?>
    </div>
    <footer>

    </footer>

</body>

</html>