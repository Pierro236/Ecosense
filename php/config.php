<?php
try {
    $db = new PDO('mysql:host=mysql:3306;dbname=ecosense;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
