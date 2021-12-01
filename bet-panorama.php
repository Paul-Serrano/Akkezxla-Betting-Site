<?php

include_once "_head.php";
include_once "_nav.php";
require "config.php";
require "connect.php";

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
                ?><pre><?php
                $ticket1 = $bet[$i]['match'.$j.''];
                echo $ticket1;
                ?></pre><?php
            }
?>
            </div>
            <div class="user-ticket">
            <?php
            for ($j = 6; $j < 11; $j++) {
                ?><pre><?php
                $ticket2 = $bet[$i]['match'.$j.''];
                echo $ticket2;
                ?></pre><?php
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


