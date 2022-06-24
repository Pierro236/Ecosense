<?php
function inserer_trame_modele($db, $t, $o, $r, $c, $n, $v, $a, $x, $horodatage)
{
    if ($c == '4') {

        $insererTrame = $db->prepare('INSERT INTO donneeco2(TypeTrame, NumeroObjet, TypeRequete, TypeCapteur, NumeroCapteur, Valeur, NumeroTrame, Chcksum, Horodatage) VALUES(:typetrame, :numeroobjet, :typerequete, :typecapteur, :numerocapteur, :valeur, :numerotrame, :chcksum, :horodatage)');
        $insererTrame->bindParam("typetrame", $t);
        $insererTrame->bindParam("numeroobjet", $o);
        $insererTrame->bindParam("typerequete", $r);
        $insererTrame->bindParam("typecapteur", $c);
        $insererTrame->bindParam("numerocapteur", $n);
        $insererTrame->bindParam("valeur", $v);
        $insererTrame->bindParam("numerotrame", $a);
        $insererTrame->bindParam("chcksum", $x);
        $insererTrame->bindParam("horodatage", $horodatage);
        $insererTrame->execute();
        $insererTrame->closeCursor();
    } else if ($c == '3') {
        $insererTrame = $db->prepare('INSERT INTO donneetemp(TypeTrame, NumeroObjet, TypeRequete, TypeCapteur, NumeroCapteur, Valeur, NumeroTrame, Chcksum, Horodatage) VALUES(:typetrame, :numeroobjet, :typerequete, :typecapteur, :numerocapteur, :valeur, :numerotrame, :chcksum, :horodatage)');
        $insererTrame->bindParam("typetrame", $t);
        $insererTrame->bindParam("numeroobjet", $o);
        $insererTrame->bindParam("typerequete", $r);
        $insererTrame->bindParam("typecapteur", $c);
        $insererTrame->bindParam("numerocapteur", $n);
        $insererTrame->bindParam("valeur", $v);
        $insererTrame->bindParam("numerotrame", $a);
        $insererTrame->bindParam("chcksum", $x);
        $insererTrame->bindParam("horodatage", $horodatage);
        $insererTrame->execute();
        $insererTrame->closeCursor();
    }
}


function rechercher_trame_modele($db, $horodatage, $c)
{


    if ($c == '4') {    //Capteur co2
        $verifHorodatage = $db->prepare("SELECT TrameId FROM donneeco2 WHERE Horodatage = :horodatage");
        $verifHorodatage->bindParam(':horodatage', $horodatage);
        $verifHorodatage->execute();
        $resultatHorodatage = $verifHorodatage->fetch();
    } else if ($c == '3') { //capeteur température
        $verifHorodatage = $db->prepare("SELECT TrameId FROM donneetemp WHERE Horodatage = :horodatage");
        $verifHorodatage->bindParam(':horodatage', $horodatage);
        $verifHorodatage->execute();
        $resultatHorodatage = $verifHorodatage->fetch();
    }

    return $resultatHorodatage;
}
