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
    <link rel="stylesheet" href="../css/playful.css" />
    <link rel="stylesheet" href="../css/navbar.css" />
    <link rel="icon" type="image/jpg" href="" />
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

    <div class="contenu">

        <div class="paragraphe">
        <div class='titre'>
            <h1>Exercice du jour</h1>

        </div>   
            <p>
                <ul>Commencez par respirer lentement.</ul>
                <ul>Inspirez profondement 5 secondes.</ul>
                <ul>Retenez votre respiration 10 secondes.</ul>
                <ul>Expirez pendant 5 ou 6 secondes.</ul>
                <ul>Répétez l'operation jusqu'à ce que vous vous sentiez détendu et que votre BPM passe en dessous de 75</ul>
            </p>
        </div>

        <div class="cardio">
            <h2 style="text-align:center"> Rythme cardiaque </h2>
             <img class="heart" src="../img/heart.png" alt="heart"/>

             <h2 style="font-size:50px;">&nbsp;  126 </h2>
    
            <div class="bpm"> BPM </div>
        </div> 




    </div>

    <footer>
    
    
    <div class="footer">
         <div class="contain">
  
        <div class="col">
         <h1>FAQ</h1>
    
         </div>
        <div class="col">
         <h1>CGU</h1>
    
        </div>
        <div class="col">
        <h1>mentions légales</h1>
    
        </div>
        <div class="col">
        <h1>contact@ecosense.com</h1>
    
     </div>

    



</body>

</html>