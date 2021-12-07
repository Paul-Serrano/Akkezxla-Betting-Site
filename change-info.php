<?php

include_once "_head.php";
include_once "_nav.php";
require_once "connect.php";

$alert = false;

if (isset($_GET["error"])) {
    $alert = true;
    if ($_GET['error'] == "missingInput") {
        $type = "warning";
        $message = "Make at least one change !";
    }
    if ($_GET['error'] == "usernameExists") {
        $type = "warning";
        $message = "Already existing username !";
    }
    if ($_GET['error'] == "passwordNotMatch") {
        $type = "warning";
        $message = "Wrong password !";
    }
    if ($_GET['error'] == "differentPasswords") {
        $type = "warning";
        $message = "new Passwords don't match !";
    }
    if ($_GET['error'] == "passwordNedeed") {
        $type = "warning";
        $message = "Former password nedeed !";
    }
}

if (isset($_GET['success'])) {
    $alert = true;
    $type = "success";
    $message = "You successfully changed your info !";
}

?>

<body>
    <main class="sign-up-main">
    <?php echo $alert ? "<div class='alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>
        <form class="change-info-form" action="change-info_post.php" method="POST">
            <div class="form-group row">
                <label for="newusername" class="col-sm-2 col-form-label sign-up-label">new Username</label>
                <input type="text" name="username" class="form-control-plaintext sign-up-input" id="newusername" value="">
            </div>
            <div class="form-group row">
                <label for="newmail" class="col-sm-2 col-form-label sign-up-label">new Email</label>
                <input type="text" name="mail" class="form-control-plaintext sign-up-input" id="newmail" value="">
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label sign-up-label">actual Password</label>
                <input type="password" name="password" class="form-control-plaintext sign-up-input" id="password" value="">
            </div>
            <div class="form-group row">
                <label for="newpassword" class="col-sm-2 col-form-label sign-up-label">new Password</label>
                <input type="password" name="newpassword" class="form-control-plaintext sign-up-input" id="newpassword" value="">
            </div>
            <div class="form-group row">
                <label for="newpassword2" class="col-sm-2 col-form-label sign-up-label">Repeat new password</label>
                <input type="password" name="newpassword2" class="form-control-plaintext sign-up-input" id="newpassword2" value="">
            </div>
            <button type="submit" name="submit-change-info" class="btn btn-outline-info sign-up-btn">Change Info</button>            
        </form>
    </main>
</body>

