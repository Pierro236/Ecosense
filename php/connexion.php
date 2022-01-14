<?php
    session_start();

    require_once 'config.php' ;

    if(isset($_POST['email']) && isset($_POST['password']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $check = $db->prepare("SELECT email, password FROM utilisateur WHERE email = '$email'");
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 1)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                
                if($data['password'] === $password)
                {
                    $_SESSION['email'] = $email; // la session peut être appelée différemment et son contenu aussi peut être autre chose que l'identifiant'
                    header ('Location:home.php');
                
                }else echo "Mot de passe incorrect";
            }else echo "Adresse email non reconnue";
        }else echo "Compte non existant";
    } else header('Location:index.php');

?>