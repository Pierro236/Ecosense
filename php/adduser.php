<?php
if ($_POST) {
    function createpassword($nbChar)
    {
        return substr(str_shuffle(
            'abcdefghjkmnopqrstuvwxyzABCEFGHJKLMNOPQRSTUVWXYZ0123456789'
        ), 1, $nbChar);
    }
    $user_password = createpassword(8);

    extract($_POST);

    $user_last_name = $_POST['user_last_name'];
    $user_first_name = $_POST['user_first_name'];
    $user_email = $_POST['user_email'];
    $options = [
        'cost' => 12,
    ];
    $hash_pass = password_hash($user_password, PASSWORD_BCRYPT, $options);
    $id_role = 1;
    include 'config.php';
    global $db;



    $c = $db->prepare("SELECT user_email FROM utilisateur WHERE user_email = :user_email");
    $c->execute(['user_email' => $user_email]);
    $result = $c->rowCount();
    if ($result == 0) {
        $q = $db->prepare(" INSERT INTO utilisateur(id_role,user_first_name,user_last_name,user_email,user_password) VALUES(:id_role, :user_first_name, :user_last_name, :user_email, :user_password)");
        $q->execute([
            'id_role' => $id_role,
            'user_first_name' => $user_first_name,
            'user_last_name' => $user_last_name,
            'user_email' => $user_email,
            'user_password' => $hash_pass
        ]);
        //envoi du mail
        $header = "MIME-Version: 1.0\r\n";
        $header .= 'From:"EcoSense"<ecosense.contact@gmail.com>' . "\n";
        $header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
        $header .= 'Content-Transfer-Encoding: 8bit';

        $message = '
        <html>

        <body>
            <div>
                Bonjour ' . $user_last_name . ' <br /><br />Bienvenu sur EcoSense.
                <br /><br />
                Un compte EcoSense vous a été créé.
                Pour y accéder, veuillez renseigner les identifiants suivants:<br />
                Identifiant : ' . $user_email . '<br />
                Mot de passe : ' . $user_password . '
                <br />

            </div>
        </body>

        </html>
        ';

        mail($user_email, "Bienvenu sur Ecosense !", $message, $header);
        echo "<p style='color:green;'>" . "Le compte a bien était créé" . "</p>";
    } else {
        echo "<p style='color:red;'>" . "Cet Email est déjà utilisé !" . "</p>";
    }
}
header('Location: registration.php');
