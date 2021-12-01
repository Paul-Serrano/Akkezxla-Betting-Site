<?php

require "dev.env.php";

//? Méthode variables d'environnement : plus safe
$db_string = "mysql:dbname=" . DATABASE . ";host=" . SERVER;

//? Méthode chaine complète (ne surtout pas push ceci sur GitHub avec des variables de prod)
// $connexion_string = "mysql:dbname=carrefive;host=localhost";
try {
    $db = new PDO($db_string, USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $db = null;
    echo 'Erreur : ' . $e->getMessage();
}

