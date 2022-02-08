<?php

include_once "_head.php";
include_once "_nav.php";
require "connectExcel.php";

$viewBet = "SELECT * from bet Where gameday=".$gameDay."";
$reqViewBet = $db->prepare($viewBet);
$betSubmit = $reqViewBet->execute();
$bet = $reqViewBet->fetchAll();

?>
</div>

<body>
    <main>
        <section>
            <div class="form-container">
                <form class="form" action="bet_post.php" method="POST">
                    <h4>Game Day <?php echo $gameDay; ?></h4>
                    <div class="form-content">         
                        <div class="ticket" id="ticket1">
                        <?php
                        for($i = 0; $i < 5; $i++) {
                        ?>   
                            <div class="match-block">
                                <p class="match"><?php echo $ticket1[$i][0]; ?> - <?php echo $ticket1[$i][1]; ?></p>
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
                        <div class="final-bet">
                            <div class="result-bet"></div>
                        </div>
                        <div class="ticket" id="ticket2">
                        <?php
                        for($i = 0; $i < 5; $i++) {
                        ?>   
                            <div class="match-block">
                                <p class="match"><?php echo $ticket2[$i][0]; ?> - <?php echo $ticket2[$i][1]; ?></p>
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
                        }?>
                        </div>
                    </div>
                    <?php 
                    if($_SESSION && !in_array($_SESSION['surname'], $existingUserSurname) ) {
                        ?>
                            <button type="button" name="" class="btn btn-light bet-btn">Submit your bet !</button>
                        <?php
                    }
                    ?>
                </form>
            </div>
        </section>
    </main>
    <script src="script.js"></script>
</body>

</html>