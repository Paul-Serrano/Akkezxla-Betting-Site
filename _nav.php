<?php

session_start();

require_once "config.php";
require_once "_loader.php";
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
    if($_SESSION) {   
?>
    <div class="nav-link" onclick="openParamOn()">
        <a id="user">
        <?php 
                echo $_SESSION['user'];
        ?>
        </a>
    </div> 
    <div class="user-param-online user-param">
    <?php
    if(isset($userSurname) && in_array($userSurname, $existingUserSurname)) {
    ?>
        <button class="btn btn-success"><a href="bet-panorama.php">Akkezxla Bet</a></button>
    <?php
    }
    else {
    ?>
        <button class="btn btn-success"><a href="bet-list.php">Akkezxla Bet</a></button>
    <?php    
    }
    ?>
        <button class="btn btn-success"><a href="ranking.php">Ranking</a></button>
        <button class="btn btn-info"><a href="change-info.php">Change Info</a></button>
        <button class="log-out btn btn-danger"><a href="?logout">Log-out</a></button>
    </div>     
    <?php
    }
    else {
    ?>
    <div class="nav-link" onclick="openParamOff()">
        <a id="user">
        <?php 
            $welcome = "Welcome, please sign up to bet !";
            echo $welcome;
        ?>
        </a>
    </div> 
    <div class="user-param-offline user-param">
        <button class="btn btn-success"><a href="bet-list.php">Akkezxla Bet</a></button>
        <button class="btn btn-success"><a href="ranking.php">Ranking</a></button>
        <button class="btn btn-info"><a href="sign-in.php">Log In</a></button>
        <button class="log-out btn btn-info"><a href="sign-up.php">Sign up</a></button>
    </div>   
    <?php }
    ?>  
</nav>