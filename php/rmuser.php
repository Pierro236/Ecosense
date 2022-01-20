<?php
include 'config.php';
global $db;

extract($_POST);

$user_to_remove = $_POST['user_to_remove'];
$stmt = $db->prepare("DELETE FROM utilisateur WHERE user_email=:user_to_remove");
$stmt->bindParam(':user_to_remove', $user_to_remove);
$stmt->execute();


header('Location: registration.php');
