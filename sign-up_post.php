<?php

if(isset($_POST["submit-sign-up"])) {
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password2'] ||
    empty($_POST['mail']) || empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['team']))) {
        header('Location:sign-up.php?error=missingInput');
        exit();
    }
     else {
        $username = htmlspecialchars(trim($_POST['username']));
        $pass = htmlspecialchars($_POST['password']);
        $pass2 = htmlspecialchars($_POST['password2']);
        $mail = $_POST["mail"];
        $team = $_POST["team"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];

        if ($pass != $pass2) {
            header('Location:sign-up.php?error=differentPasswords');
            exit();
        }

        $db = new PDO('mysql:host=localhost;dbname=bet', 'root', '');

        $sql = "SELECT * FROM user WHERE mail = '$mail' ";
        $result = $db->prepare($sql);
        $result->execute();

        if($result->rowCount() > 0) {
            echo "Already existing user ! dumb bitch ...";
        }
        else {
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (username, mail, name, surname, team, password)
            VALUES ('$username', '$mail', '$name', '$surname', '$team', '$pass')";
            $req = $db->prepare($sql);
            $req->execute();
        }

        if ($req) {
            $_SESSION['user'] = $username;
            header('Location:index.php?success=loginSuccessful');
            exit();
        }
    }

    
}

?>