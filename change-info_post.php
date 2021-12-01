<?php 

unset($_SESSION["user"]);
session_start();

require "connect.php";
require "config.php";

if(isset($_POST["submit-change-info"])) {
    if (empty($_POST['username']) && empty($_POST['newpassword']) && empty($_POST['newpassword2']) && empty($_POST['mail'])) {
        header('Location:change-info.php?error=missingInput');
        exit();
    }
    else {
        $newusername = htmlspecialchars(trim($_POST['username']));
        $pass = htmlspecialchars($_POST['password']);
        $newpass = htmlspecialchars($_POST['newpassword']);
        $newpass2 = htmlspecialchars($_POST['newpassword2']);
        $newpassHashed = password_hash($newpass, PASSWORD_DEFAULT);
        $newmail = $_POST["mail"];

        if (empty($pass)) {
            header('Location:change-info.php?error=passwordNedeed');
            exit();
        }

        if (!password_verify($pass, $_SESSION['pass'])) {
            header('Location:change-info.php?error=passwordNotMatch');
            exit();
        }

        if ($newpass != $newpass2) {
            header('Location:change-info.php?error=differentPasswords');
            exit();
        }

        if (!empty($newusername)) {
            try {
                $editUsername = 'UPDATE user SET username=:username WHERE id='.$_SESSION['id'].'';
                $reqEditUsername = $db->prepare($editUsername);
                $reqEditUsername->bindValue(':username', $newusername, PDO::PARAM_STR);
                $reqUsername = $reqEditUsername->execute();
            }
            catch (PDOException $e) {
                $db = null;
                echo 'Erreur : '.$e->getMessage();
            }
        }

        if (!empty($newmail)) {
            try {
                $editMail = 'UPDATE user SET mail=:mail WHERE id='.$_SESSION['id'].'';
                $reqEditMail = $db->prepare($editMail);
                $reqEditMail->bindValue(':mail', $newmail, PDO::PARAM_STR);
                $reqMail = $reqEditMail->execute();
            }
            catch (PDOException $e) {
                $db = null;
                echo 'Erreur : '.$e->getMessage();
            }
        }

        if (!empty($newpass)) {
            try {
                $editPass = 'UPDATE user SET password=:newpass WHERE id='.$_SESSION['id'].'';
                $reqEditPass = $db->prepare($editPass);
                $reqEditPass->bindValue(':newpass', $newpassHashed, PDO::PARAM_STR);
                $reqPass = $reqEditPass->execute();
            }
            catch (PDOException $e) {
                $db = null;
                echo 'Erreur : '.$e->getMessage();
            }
        }

        if ($reqUsername) {
            $_SESSION['user'] = $newusername;
            header('Location:change-info.php?success=changeSuccessful');
        }

        if ($reqMail || $reqPass) {
            header('Location:change-info.php?success=changeSuccessful');
        }
    }
}

?>

