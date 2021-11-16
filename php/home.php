<!DOCTYPE html>
<html>
<head>
    <?php /*if ($_GET['lang'] == 'fr') {
        echo '<link href="css/style_main.css" rel="stylesheet" type="text/css" media="screen">';
    } elseif ($_GET['lang'] == 'en') {
        echo '<link href="css/style_main.css" rel="stylesheet" type="text/css" media="screen">';
    } elseif ($_GET['lang'] == 'de') {
        echo '<link href="css/style_main.css" rel="stylesheet" type="text/css" media="screen">';
    } else echo '<link href="css/style_main.css" rel="stylesheet" type="text/css" media="screen">';
    */ ?>
    <meta charset="utf-8" />
    <title>EcoSense | Accueil</title>
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="icon" type="image/jpg" href="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
</head>


    <div class="navbar">
  <img src="../img/logo.png" alt="logo"/>      
  <a class="ES"> EcoSense</a>      
  <a class="home">Accueil</a>
  <a class="name">Nom</a>
  
</div> 
<div>
        <form method="POST" action="">
            <select id="lang" name="lang">
                <option value="fr">Francais</option>
                <option value="en">English</option>
            </select>
            <input type="submit" value="Envoyer">
        </form>

        
    
    </div>  
    <div class="wrap">
   <div class="search">
      <input type="text" class="searchTerm" placeholder="Recherchez une salle">
      <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
   </div>
</div>      
</body>
</html>