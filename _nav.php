<?php

session_start();

require "config.php";
require_once "checkExistingTicket.php";

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
       <div class="nav-link"><a href="sign-in.php">Sign Up/Sign In</a></div>
    <?php }
    ?>
    <?php
    if(isset($userSurname) && in_array($userSurname, $existingUserSurname)) {
    ?>
        <div class="nav-link"><a href="bet-panorama.php">Akkezxla Bet</a></div>
    <?php
    }
    else {
    ?>
        <div class="nav-link"><a href="bet-list.php">Akkezxla Bet</a></div>
    <?php    
    }
    ?>
    <div class="nav-link"><a href="ranking.php">Ranking</a></div>
</nav>

<nav class="phone-nav">
<?php    
    if(true) {   
?>
    <div class="nav-link" id="user">
        <a><?php echo $_SESSION['user'];?></a>
    </div> 
    <div class="user-param">
    <?php
    if(isset($userSurname) && in_array($userSurname, $existingUserSurname)) {
    ?>
        <div class="nav-link"><a href="bet-panorama.php">Akkezxla Bet</a></div>
    <?php
    }
    else {
    ?>
        <div class="nav-link"><a href="bet-list.php">Akkezxla Bet</a></div>
    <?php    
    }
    ?>
        <div class="nav-link"><a href="ranking.php">Ranking</a></div>
        <button class="btn btn-info"><a href="change-info.php">Change Info</a></button>
        <button class="log-out btn btn-danger"><a href="?logout">Log-out</a></button>
    </div>     
    <?php
    }
    else {
    ?>
    <div class="nav-link"><a href="sign-in.php">Sign Up/Sign In</a></div>
    <?php }
    ?>
</nav>