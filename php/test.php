<?php
echo session_save_path();
require_once 'config.php';

$user_email = 'julien.godfroy27@gmail.com';
$user_password = 'admin';

$sql  = "SELECT * FROM utilisateur WHERE user_email = '$user_email' LIMIT 1";
$q = $db->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$datauser = $q->fetch();
echo $datauser['user_email'];
