<?php
    session_start();

    require_once 'config.php' ;

    if(isset($_POST['email']) && isset($_POST['password']))
    {
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];

        $check = $db->prepare("SELECT user_email, user_password FROM utilisateur WHERE user_email = '$user_email'");
        $check->execute(array($user_email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 1)
        {
            if(filter_var($user_email, FILTER_VALIDATE_EMAIL))
            {
                
                //if($data['user_password'] === $user_password)
                if( password_verify($user_password, $data['user_password']))
                {
                    $_SESSION['user_email'] = $user_email; // la session peut être appelée différemment et son contenu aussi peut être autre chose que l'identifiant'
                    header ('Location:home.php');
                
                }else echo "Mot de passe incorrect";
            }else echo "Adresse user_email non reconnue";
        }else echo "Compte non existant";
    } else header('Location:index.php');

?>