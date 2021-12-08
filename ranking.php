<?php

include_once "_head.php";
include_once "_nav.php";
require_once "connectExcel.php";
require_once "ranking_post.php";

// ?><pre><?php
// var_dump($totalScore);
// var_dump($userPoints);
// var_dump($checkTotalScore);
// ?></pre><?php?>

<body>
    <main class="main-ranking">
        <div class="ranking-wrapper ligue1-ranking-wrapper">
            <table class="ranking ligue1-ranking">
                <tr>
                    <th>Rank</th>
                    <th>Team</th>
                    <th>Points</th>
                    <th>Goal Diff</th>
                </tr>
                <?php
                for($i = 0; $i < 20; $i++){
                ?>
                <tr>
                    <td><?php echo $i + 1; ?></td>
                    <td><?php echo $teamRank[$i]; ?></td>
                    <td><?php echo $teamPoints[$i]; ?></td>
                    <td><?php echo $teamGoalDiff[$i]; ?></td>
                </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <div class="akkezxla">
            <form action="ranking_post.php" method="POST">
                <?php
                if($_SESSION['user'] == "Paulux") {
                ?>
                <button class="btn btn-outline-info" name="next-gameday" type="submit">Update Results</button>
                <?php
                }
                ?>
            </form>
            <div class="result-wrapper akkezxla-result-wrapper">
                <?php
                if(isset($points)) {
                ?>
                <table class="result akkezxla-result">
                    <tr>
                        <th>GameDay <?php echo $gameDay - 1; ?></th>
                        <th>P</th>
                    </tr>
                <?php
                for($i = 0; $i < count($userBet); $i++) {
                ?>
                    <tr>
                        <td><?php echo $points[$i][1];?></td>
                        <td><?php echo $points[$i][2];?></td>
                    </tr>
                <?php
                }
                ?>   
                </table>
                <?php
                }
                ?>
            </div>
            <div class="ranking-wrapper akkezxla-ranking-wrapper">
            <?php
            if(isset($userPoints)){
            ?>
                <table class="akkezxla-ranking">
                    <tr>
                        <th>General Ranking</th>
                        <th>Points</th>
                    </tr>
                    <?php
                    for($i = 0; $i < $playersNumber; $i++) {
                    ?>
                    <tr>
                        <td><?php echo $userPoints[$i][0];?></td>
                        <td><?php echo $userPoints[$i][1];?> Points</td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            <?php
            }
            ?>
            </div>
        </div>
    </main>
</body>