<?php
if ($_POST) {

    extract($_POST);

    $room_name = $_POST['room_name'];

    include 'config.php';
    global $db;

    $c = $db->prepare("SELECT room_name FROM room WHERE room_name = :room_name");
    $c->execute(['room_name' => $room_name]);
    $result = $c->rowCount();
    if ($result == 0) {
        $q = $db->prepare(" INSERT INTO room(room_name) VALUES(:room_name)");
        $q->execute([
            'room_name' => $room_name,

        ]);

        echo "<p style='color:green;'>" . "La salle a bien été ajoutée" . "</p>";
    } else {
        echo "<p style='color:red;'>" . "Cette est existe déjà !" . "</p>";
    }
}
