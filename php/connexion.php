<?php
session_start();

require_once 'config.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    $check = $db->prepare("SELECT user_email, user_password FROM utilisateur WHERE user_email = ?");
    $check->execute(array($user_email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if ($row == 1) {
        if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            if (password_verify($user_password, $data['user_password'])) {
                $sql = "SELECT * FROM utilisateur WHERE user_email = ? LIMIT 1";
                $q = $db->prepare($sql);
                $q->execute(array($user_email));
                $datauser = $q->fetch(PDO::FETCH_ASSOC);
                if ($datauser) {
                    $_SESSION['user_email'] = $user_email;
                    $_SESSION['user_last_name'] = $datauser['user_last_name'];
                    $_SESSION['user_first_name'] = $datauser['user_first_name'];
                    $_SESSION['role'] = ($datauser['id_role'] == 1) ? 'user' : 'admin';
                    header('Location:home.php');
                    exit();
                } else {
                    $_SESSION['mess'] = "Une erreur s'est produite lors de la récupération des informations de l'utilisateur.";
                }
            } else {
                $_SESSION['mess'] = "Mot de passe incorrect !";
            }
        } else {
            $_SESSION['mess'] = "Adresse email non reconnue!";
        }
    } else {
        $_SESSION['mess'] = "Compte non existant!";
    }
} else {
    $_SESSION['mess'] = "Veuillez fournir une adresse email et un mot de passe.";
}

header('Location:../index.php');
exit();
