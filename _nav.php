<?php

session_start();

require "config.php";

?>

<nav class="nav">
    <?php    
    if(!empty($_SESSION)) {   
    ?>
        <div class="nav-link" id="user">
            <a><?php echo $_SESSION['user'];?></a>
            <div class="user-param">
                <button class="btn btn-info"><a href="change-info.php">Change Info</a></button>
                <button class="log-out btn btn-danger"><a href="?logout">Log-out</a></button>
            </div>
        </div>      
    <?php
    }
    else {
    ?>
       <div class="nav-link"><a href="sign-up.php">Sign Up/Sign In</a></div>
    <?php }
    ?>
    <?php
    if(false) {
    ?>
        <div class="nav-link"><a href="bet-panorama.php">Akkezxla Bet</a></div>
    <?php
    }
    else {
    ?>
        <div class="nav-link"><a href="index.php">Akkezxla Bet</a></div>
    <?php    
    }
    ?>
    <div class="nav-link"><a href="ranking.php">Ranking</a></div>
</nav>