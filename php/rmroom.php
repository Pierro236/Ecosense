<?php
include 'config.php';
global $db;

extract($_POST);

$room_to_remove = $_POST['room_to_remove'];
$stmt = $db->prepare("DELETE FROM room WHERE room_name=:room_to_remove");
$stmt->bindParam(':room_to_remove', $room_to_remove);
$stmt->execute();


header('Location: registration.php');
