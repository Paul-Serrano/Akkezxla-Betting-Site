<?php

include_once "_head.php";
include_once "_nav.php";
require_once "ranking_post.php";

?>

<body>
    <main class="main-ranking">
        <div class="akkezxla">
            <?php 
            if($_SESSION['user'] == 'Paulux') { 
            ?>
            <button class="btn btn-outline-info update-opener-btn" name="" type="button">Update Results/Score</button>
            <div class="update-form-container">
                <div class="top-update-form">
                    <form action="ranking_post.php" class="update-score-form" method="POST">
                        <button class="btn btn-outline-success update-score-btn" name="update-score" type="submit">Update User Score</button>
                    </form>
                    <span class="close-update-form">&times;</span>
                </div>
                <form action="ranking_post.php" class="update-result-form" method="POST">
                    <div class="update-result-form-content">
                        <div class="ticket" id="ticket1">
                        <?php
                        for($i = 0; $i < 5; $i++) {
                        ?>   
                            <div class="match-block">
                                <p class="match"><?php echo $ticket1[$i][0]; ?> -- <?php echo $ticket1[$i][1]; ?></p>
                                <div class="bet-block">
                                    <input id="match<?php echo $i?>-1" name="match<?php echo $i?>" type="radio" value="1" />
                                    <label for="match<?php echo $i?>-1">
                                        <p>1</p>
                                    </label>
                                    <input id="match<?php echo $i?>-N" name="match<?php echo $i?>" type="radio" value="N" />
                                    <label for="match<?php echo $i?>-N">
                                        <p>Nul</p>
                                    </label>
                                    <input id="match<?php echo $i?>-2" name="match<?php echo $i?>" type="radio" value="2" />
                                    <label for="match<?php echo $i?>-2">
                                        <p>2</p>
                                    </label>
                                </div>
                            </div>    
                        <?php
                        }
                        ?>
                        </div>
                        <button class="btn btn-outline-info update-result-btn" name="update-result" type="submit">Update Results</button>
                        <div class="ticket" id="ticket2">
                        <?php
                        for($i = 0; $i < 5; $i++) {
                        ?>   
                            <div class="match-block">
                                <p class="match"><?php echo $ticket2[$i][0]; ?> -- <?php echo $ticket2[$i][1]; ?></p>
                                <div class="bet-block">
                                    <input id="match<?php echo $i + 5 ?>-1" name="match<?php echo $i + 5 ?>" type="radio" value="1" />
                                    <label for="match<?php echo $i + 5 ?>-1">
                                        <p>1</p>
                                    </label>
                                    <input id="match<?php echo $i + 5 ?>-N" name="match<?php echo $i + 5 ?>" type="radio" value="N" />
                                    <label for="match<?php echo $i + 5 ?>-N">
                                        <p>Nul</p>
                                    </label>
                                    <input id="match<?php echo $i + 5 ?>-2" name="match<?php echo $i + 5 ?>" type="radio" value="2" />
                                    <label for="match<?php echo $i + 5 ?>-2">
                                        <p>2</p>
                                    </label>
                                </div>
                            </div>    
                        <?php
                        }
                        ?>
                        </div>
                    </div>
            </form>
            </div>
            <?php
            }
            ?>
            <div class="result-wrapper akkezxla-result-wrapper">
                <?php
                if(!empty($points)) {
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
            if(!empty($userRanking[0])){
            ?>
                <table class="akkezxla-ranking">
                    <tr>
                        <th>Rk</th>
                        <th>General Ranking</th>
                        <th>n°of bet</th>
                        <th>Points</th>
                        <th>Pts/bet</th>

                    </tr>
                    <?php
                    for($i = 0; $i < count($userRanking); $i++) {
                    ?>
                    <tr>
                        <td><?php echo $i + 1;?></td>
                        <td><?php echo $userRanking[$i][0];?></td>
                        <td><?php echo $userRanking[$i][2];?></td>
                        <td><?php echo $userRanking[$i][1];?></td>
                        <td><?php echo round($userRanking[$i][3], 2);?></td>
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
    <script src="script.js"></script>
</body>