<?php



session_start();

$faqm=$_POST['message'];
$dest = "pierresedo@gmail.com";
$sujet = "MESSAGE d'un utilisateur";



$headers = "MIME-Version: 1.0\r\n";
$headers .= 'From:"UTILISATEUR ECOSENSE"<ladk521@gmail.com>' . "\n";
$headers .= 'Content-Type:text/html; charset="uft-8"' . "\n";

$corp = '
	<html>
		<body>
			<div >
                <p> Nouveau Message de :'. $_SESSION['email'] .';<br>
				<p> '.$faqm.'</p>
					
			</div>
		</body>
	</html>
';







if (mail($dest, $sujet, $corp, $headers)) {
    $_SESSION['envoie']='Votre message à été envoyé avec succès,nous reviendrons bientôt vers vous.'
;
  };

header('Location:../php/FAQ.php');



?>