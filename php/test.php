<?php

require_once 'config.php';



$sql = $db->prepare('SELECT room_name FROM room');
$sql->execute();
$rooms = $sql->fetchAll(PDO::FETCH_COLUMN);
echo count($rooms);
echo $rooms[4];
/*
$sql  = "SELECT room_name FROM room";
$q = $db->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$room = $q->fetch();
echo $room[0]['id_room'];*/
