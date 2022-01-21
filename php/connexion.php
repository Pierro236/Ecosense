<?php
session_start();

require_once 'config.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    $check = $db->prepare("SELECT user_email, user_password FROM utilisateur WHERE user_email = '$user_email'");
    $check->execute(array($user_email));
    $data = $check->fetch();
    $row = $check->rowCount();

    $sql  = "SELECT * FROM utilisateur WHERE user_email = '$user_email' LIMIT 1";
    $q = $db->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $datauser = $q->fetch();


    if ($row == 1) {
        if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {

            //if($data['user_password'] === $user_password)
            if (password_verify($user_password, $data['user_password'])) {
                $_SESSION['user_email'] = $user_email; // la session peut être appelée différemment et son contenu aussi peut être autre chose que l'identifiant'
                $_SESSION['user_last_name'] = $datauser['user_last_name'];
                $_SESSION['user_first_name'] = $datauser['user_first_name'];
                if ($datauser['id_role'] == 1) {
                    $_SESSION['role'] = 'user';
                } else {
                    $_SESSION['role'] = 'admin';
                }
                header('Location:home.php');
            } else{
                $_SESSION['mess'] = "Mot de passe incorrect !";
                header('Location:../index.php');
            } ;
        } else{
                $_SESSION['mess'] = "Adresse email non reconnue!";
                header('Location:../index.php');
            } ;
    } else{
                $_SESSION['mess'] = "Compte non existant!";
                header('Location:../index.php');
            } ;
} else header('Location:index.php');
