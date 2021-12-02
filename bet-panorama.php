<?php

include_once "_head.php";
include_once "_nav.php";
require "config.php";
require "connect.php";
require "connectExcel.php";

$viewBet = "SELECT * from bet";
$reqViewBet = $db->prepare($viewBet);
$betSubmit = $reqViewBet->execute();
$bet = $reqViewBet->fetchAll();

?>

<body>
    <main>
        <div class="panorama">
<?php
    for ($i = 0; $i < count($bet); $i++) {
?>

        <div class="user">
<?php
?>

            <div class="ticket-surname">
            <?php
            echo $bet[$i]['surname'];
            ?>
            </div>
<div class="user-bet">
<div class="user-ticket">
            <?php
            for ($j = 1; $j < 6; $j++) {
            ?>
                <p class="user-result"><?php
                $resultTicket1 = $bet[$i]['match'.$j.''];
                    ?><span class="team"><?php echo $ticket1[-4 + $gameDay*10 + $j][0];?></span>
                    <span class="team-choice"><?php echo " | ".$resultTicket1." | ";?></span>
                    <span class="team"><?php echo $ticket1[-4 + $gameDay*10 + $j][1];?></span>
                </p>
            <?php
            }
            ?>
            </div>
            <hr class="ticket-hr">
            <div class="user-ticket">
            <?php
            for ($j = 6; $j < 11; $j++) {
            ?>
                <p class="user-result"><?php
                $resultTicket2 = $bet[$i]['match'.$j.''];
                    ?><span class="team"><?php echo $ticket2[-4 + $gameDay*10 + $j][0];?></span> 
                    <span class="team-choice"><?php echo " | ".$resultTicket2." | ";?></span>
                    <span class="team"><?php echo $ticket2[-4 + $gameDay*10 + $j][1];?></span>
                </p><?php
            }
?>
            </div>
</div>
            
            </div>
<?php
}
?>
        </div>

    </main>
</body>


