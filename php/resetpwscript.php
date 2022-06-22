<?php
include 'config.php';
global $db;
session_start();
extract($_POST);

$user_password = $_POST['actualpw'];
$newpw = $_POST['newpw'];
$confirmpw = $_POST['confirmpw'];

//mail of the account connected
$user_email = $_SESSION['user_email'];


$check = $db->prepare("SELECT user_email, user_password FROM utilisateur WHERE user_email = '$user_email'");
$check->execute(array($user_email));
$data = $check->fetch();
$row = $check->rowCount();

$sql  = "SELECT * FROM utilisateur WHERE user_email = '$user_email' LIMIT 1";
$q = $db->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$datauser = $q->fetch();

$options = [
    'cost' => 12,
];

if ($newpw == $confirmpw) {
    if (password_verify($user_password, $data['user_password'])) {
        $hash_pass = password_hash($newpw, PASSWORD_BCRYPT, $options);
        $sql = "UPDATE utilisateur SET user_password='$hash_pass' WHERE user_email = '$user_email'";
        $db->query($sql);
        $_SESSION['mess'] = "Mot de passe modifié !";
        $header = "MIME-Version: 1.0\r\n";
        $header .= 'From:"EcoSense"<ecosense.contact@gmail.com>' . "\n";
        $header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
        $header .= 'Content-Transfer-Encoding: 8bit';

        $message = '
        <html>

        <body>
            <div>
                Bonjour ' . $_SESSION['user_first_name'] .  ' ' . $_SESSION['user_last_name'] . ', <br />
                <br /><br />
                Le mot de passe de votre compte EcoSence a bien été modifié.<br />
                Si cette opération a été faite contre votre gré, merci de contacter votre administrateur au plus vite !<br />
                <br />
                Hâte de vous revoir sur EcoSense.
                <br />
                Equipe EcoSense

            </div>
        </body>

        </html>
        ';

        mail($user_email, "EcoSense - Mot de passe modifié", $message, $header);
        header('Location: resetpw.php');
        //header('Location:home.php');
    } else {
        $_SESSION['mess'] = "Mot de passe incorrect !";
        //$_SESSION['mess'] = "Mot de passe incorrect !";
        //header('Location:../index.php');
    };
} else {
    $_SESSION['mess'] = "Les mots de passe doivent correspondre !";
    //$_SESSION['mess'] = "Adresse email non reconnue!";
    //header('Location:../index.php');
};



//$stmt = $db->prepare("DELETE FROM utilisateur WHERE user_email=:user_to_remove");
//$stmt->bindParam(':user_to_remove', $user_to_remove);
//$stmt->execute();


//header('Location: registration.php');
