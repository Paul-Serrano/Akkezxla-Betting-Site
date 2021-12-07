<?php

require_once "connect.php";
require_once "connectExcel.php";

try {
    $verifExistingTicket = 'SELECT surname FROM bet Where gameday='.$gameDay.'';
    $reqVerifExistingTicket = $db->prepare($verifExistingTicket);
    $reqVerifExistingTicket->execute();

    $existingTicket = $reqVerifExistingTicket->fetchAll();
    $existingUserSurname = [];

    for ($i = 0; $i < count($existingTicket); $i++) {
        array_push($existingUserSurname, $existingTicket[$i]["surname"]);
    }

} catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

?>