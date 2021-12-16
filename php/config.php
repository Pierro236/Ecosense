<?php
try {
    $db = new PDO('mysql:host=localhost:3306;dbname=ecosense;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
