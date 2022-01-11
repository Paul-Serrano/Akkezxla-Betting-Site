<?php

// unset($_SESSION["user"]);
session_start();

require "connect.php";
require "config.php";
require_once "checkExistingTicket.php";


if (empty($_POST['username']) || empty($_POST['pass'])) {
    header('Location:sign-in.php?error=missingInput');
    exit();
} else {
   
    $username = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars($_POST['pass']);
}

try {
    $verifUsername = 'SELECT * FROM user WHERE username = :username LIMIT 1';
    $reqVerifUsername = $db->prepare($verifUsername);
    $reqVerifUsername->bindValue(':username', $username, PDO::PARAM_STR);
    $reqVerifUsername->execute();

    $user = $reqVerifUsername->fetch();
} catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

if ($user) {
    if (!password_verify($pass, $user['password'])) {
        header('Location:sign-in.php?error=passwordNotMatch');
        exit();
    } else {
        $_SESSION['user'] = $user['username'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['pass'] = $user['password'];
        $_SESSION['surname'] = $user['surname'];
        if(!in_array($_SESSION['surname'], $existingUserSurname)){
            header('Location:bet-list.php');
        }
        else {
            header('Location:bet-panorama.php');
        }
        
    }
}
else {
    header('Location:sign-in.php?error=userUnknown');
    exit();
}
        
?>