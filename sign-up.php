<?php

include_once "_head.php";
include_once "_nav.php";

$alert = false;

if (isset($_GET["error"])) {
    $alert = true;
    if ($_GET['error'] == "missingInput") {
        $type = "secondary";
        $message = "All fields are required";
    }
    if ($_GET['error'] == "usernameExists") {
        $type = "secondary";
        $message = "Already existing username !";
    }
    if ($_GET['error'] == "differentPasswords") {
        $type = "warning";
        $message = "Passwords don't match !";
    }
}

if (isset($_GET['success'])) {
    $alert = true;
    $type = "success";
    $message = "You successfully signed up !";
}

?>

<body>
    <main class="sign-up-main">
        <form class="sign-up-form">
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label sign-up-label">Username</label>
                <input type="text" class="form-control-plaintext sign-up-input" id="username" value="">
            </div>
            <div class="form-group row">
                <label for="mail" class="col-sm-2 col-form-label sign-up-label">Email</label>
                <input type="text" class="form-control-plaintext sign-up-input" id="mail" value="">
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label sign-up-label">Name</label>
                <input type="text" class="form-control-plaintext sign-up-input" id="name" value="">
            </div>
            <div class="form-group row">
                <label for="surname" class="col-sm-2 col-form-label sign-up-label">Surname</label>
                <input type="text" class="form-control-plaintext sign-up-input" id="surname" value="">
            </div>
            <div class="form-group row">
                <label for="team" class="col-sm-2 col-form-label sign-up-label">Favourite Team</label>
                <input type="text" class="form-control-plaintext sign-up-input" id="team" value="">
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label sign-up-label">Password</label>
                <input type="text" class="form-control-plaintext sign-up-input" id="password" value="">
            </div>
            <div class="form-group row">
                <label for="password2" class="col-sm-2 col-form-label sign-up-label">Repeat password</label>
                <input type="text" class="form-control-plaintext sign-up-input" id="password2" value="">
            </div>
            <button type="submit" class="btn btn-outline-info sign-up-btn">Sign Up</button>
        </form>
    </main>
</body>