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
  background-color: #77C3DC;
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
        <a class="home">Accueil</a>
        <a class="name">Nom</a>

    </div>



    <form method="GET" action="">
        <select id="lang" name="lang">
            <option value="fr">Francais</option>
            <option value="en">English</option>
        </select>
        <input type="submit" value="Changer la langue">
    </form>
<h1 style="text-align:center;" >
<br><br>Ma fréquence cardiaque
</h1>
    <div class="cardio">
        <h2 style="text-align:center"> Rythme cardiaque </h2>
        <img class="heart" src="../img/heart.png" alt="heart"/>

        <h2 style="font-size:50px;">&nbsp;  126 </h2>
    
        <div class="bpm"> BPM </div>
    </div> 
    <div class="cons"> <h2 style="text-align:left">&nbsp; Ceci est un bloc dont j'ignore l'utilité <br>
    &nbsp; Je le remplis de phrase pour jauger la taille <br>&nbsp; Blablablablablabalbla</h2> </div>

    <h1 style="text-align:center;" >
    <br><br><br><br><br><br><br><br><br><br><br><br><br>Mes Statistiques 
    </h1>

    <div class="graph1"> <br>&nbsp;&nbsp;Graphe 1  </div>

    <div class="graph2"> <br>&nbsp;&nbsp;Graphe 2 </div>

    
    
    <a href="playful.php"><button>
    <span>Relaxez-vous<br></span>
    </button> 
    </a>

    

    


</body>

</html>