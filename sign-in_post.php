<?php

unset($_SESSION["user"]);
session_start();

require "connect.php";
require "config.php";


if (empty($_POST['username']) || empty($_POST['pass'])) {
    header('Location:sign-in.php?error=missingInput');
    exit();
} else {
   
    $username = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars($_POST['pass']);
}

try {
    //? Requête préparée de récupération de l'utilisateur
    //* Dans le cas d'un champ unique (ici username) qui serait utilisable avec l'username ou l'email on écrirait la requête de cette façon.
    // $verifUsername = "SELECT * FROM user WHERE username = :username OR email = :username";
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
        header('Location:index.php');
    }
}
else {
    header('Location:sign-in.php?error=userUnknown');
    exit();
}
        
?>