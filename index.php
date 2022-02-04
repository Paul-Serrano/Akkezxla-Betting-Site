<?php

session_start();

require_once "connect.php";
require_once "connectExcel.php";
require_once "config.php";
require_once "checkExistingTicket.php";
include_once "_head.php";

if($_SESSION && in_array($_SESSION['surname'], $existingUserSurname) ) {
    header('Location:bet-panorama.php');
}

else {
    header('Location:bet-list.php');
}

?>
