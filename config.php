<?php

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location:index.php');
}

if (empty($_SESSION)) {
    if (isset($auth)) {
        header('Location:sign-in.php?auth');
        exit();
    }
    $user = null;
} else {
    $user = $_SESSION['user'];
}

?>