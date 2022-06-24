<?php
function getlogtemp()
{
    include 'insertdata.php';
    include 'config.php';
    global $db;
    ////////////RECUPERER LE LOG
    // initialisation de la session
    $ch = curl_init();

    // configuration des options
    curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G5D_");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    // A ajouter sinon il se passe rien : https://stackoverflow.com/questions/14679886/why-does-curl-return-an-empty-string
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);


    $data = curl_exec($ch);

    // fermeture des ressources
    curl_close($ch);

    //echo "Raw Data:<br />";
    //echo $data;


    ///////TRANSFORMER SOUS FORME DE TABLEAU
    $data_tab = str_split($data, 33); //créer une liste avec toutes les trames
    $data_tab_capteur = array();    //on créer une liste vide qui recevra les trames d'UN SEUL CAPTEUR
    for ($i = 0, $size = count($data_tab); $i < $size; $i++) {  //pour chaque trame mélangé
        list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
            sscanf($data_tab[$i], "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
        if ($c == "3") {      //si le type du capteur est 3 (capteur de température)
            array_push($data_tab_capteur, $data_tab[$i]);   //alors on ajoute cette trame dans l'array vide
            $horodatage = date("Y-m-d H:i:s", strtotime($year . "-" . $month . "-" . $day . " " . $hour . ":" . $min . ":" . $sec));

            $resultatHorodatage = rechercher_trame_modele($db, $horodatage, $c);
            if ($resultatHorodatage == false) {
                inserer_trame_modele($db, $t, $o, $r, $c, $n, $v, $a, $x, $horodatage);
            }
        }
    }
    //echo "Tabular Data:<br />";
    //for ($i = 0, $size = count($data_tab_capteur); $i < $size; $i++) {
    //    echo "Trame $i: $data_tab_capteur[$i]<br />";
    //}


    ///////DECODER LA TRAME
    $trame = $data_tab_capteur[count($data_tab_capteur) - 2];  //décodage de la trame 0
    // décodage avec des substring
    //$t = substr($trame, 0, 1);
    //$o = substr($trame, 1, 4);
    // …
    // décodage avec sscanf
    list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
        sscanf($trame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");



    $valeur_capteur = hexdec($v);
    return $valeur_capteur;
}
