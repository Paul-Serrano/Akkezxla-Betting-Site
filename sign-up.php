<?php

include_once "_head.php";

$alert = false;

if (isset($_GET["error"])) {
    $alert = true;
    if ($_GET['error'] == "missingInput") {
        $type = "warning";
        $message = "All fields are required";
    }
    if ($_GET['error'] == "usernameExists") {
        $type = "warning";
        $message = "Already existing user !";
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
    <?php echo $alert ? "<div class='alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>
        <form class="sign-up-form" action="sign-up_post.php" method="POST">
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label sign-up-label">Username</label>
                <input type="text" name="username" class="form-control-plaintext sign-up-input" id="username" value="">
            </div>
            <div class="form-group row">
                <label for="mail" class="col-sm-2 col-form-label sign-up-label">Email</label>
                <input type="text" name="mail" class="form-control-plaintext sign-up-input" id="mail" value="">
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label sign-up-label">Name</label>
                <input type="text" name="name" class="form-control-plaintext sign-up-input" id="name" value="">
            </div>
            <div class="form-group row">
                <label for="surname" class="col-sm-2 col-form-label sign-up-label">Surname</label>
                <input type="text" name="surname" class="form-control-plaintext sign-up-input" id="surname" value="">
            </div>
            <div class="form-group row">
                <label for="team" class="col-sm-2 col-form-label sign-up-label">Favourite Team</label>
                <input type="text" name="team" class="form-control-plaintext sign-up-input" id="team" value="">
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label sign-up-label">Password</label>
                <input type="password" name="password" class="form-control-plaintext sign-up-input" id="password" value="">
            </div>
            <div class="form-group row">
                <label for="password2" class="col-sm-2 col-form-label sign-up-label">Repeat password</label>
                <input type="password" name="password2" class="form-control-plaintext sign-up-input" id="password2" value="">
            </div>
            <button type="submit" name="submit-sign-up" class="btn btn-outline-info sign-up-btn">Sign Up</button>            
        </form>
        <p>Already have an account ? Go <a href="sign-in.php">Sign in !</a></p>
    </main>
    <script src="script.js"></script>
</body>