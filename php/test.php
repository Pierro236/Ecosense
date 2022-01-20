<?php

require_once 'config.php';


$sql = $db->prepare('SELECT user_email FROM utilisateur WHERE id_role != 0');
$sql->execute();
$utilisateurs = $sql->fetchAll(PDO::FETCH_COLUMN);
var_dump($utilisateurs);
