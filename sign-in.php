<?php

include_once "_head.php";
include_once "_nav.php";

$alert = false;

if (isset($_GET["error"])) {
    $alert = true;
    if ($_GET['error'] == "missingInput") {
        $type = "warning";
        $message = "All fields are required";
    }

    if ($_GET['error'] == "passwordNotMatch") {
        $type = "warning";
        $message = "Wrong Password !";
    }

    if ($_GET['error'] == "userUnknown") {
        $type = "warning";
        $message = "Unknown user !";
    }
}

?>

<body>
    <main class="sign-in-main">
    <?php echo $alert ? "<div class='alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>
        <form class="sign-in-form" action="sign-in_post.php" method="POST">
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label sign-up-label">Username</label>
                <input type="text" name="username" class="form-control-plaintext sign-up-input" id="username" value="">
            </div>           
            <div class="form-group row">
                <label for="pass" class="col-sm-2 col-form-label sign-up-label">Password</label>
                <input type="password" name="pass" class="form-control-plaintext sign-up-input" id="pass" value="">
            </div>
            <button type="submit" name="submit-sign-in" class="btn btn-outline-info sign-up-btn">Sign In</button>
        </form>
        <p>Don't have an account ? go <a href="sign-up.php">Sign up !</a></p>
    </main>
    <script src="script.js"></script>
</body>