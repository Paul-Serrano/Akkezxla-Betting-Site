<nav class="nav">
    <?php    
    if(!isset($_SESSION['user'])) {
        echo('<div class="nav-link"><a href="sign-up.php">Sign Up/Sign In</a></div>
        ');
        }
    else {
        echo $username;
    }
    ?>
    <div class="nav-link"><a href="index.php">Akkezxla Bet</a></div>
    <div class="nav-link"><a href="ranking.php">Ranking</a></div>
</nav>