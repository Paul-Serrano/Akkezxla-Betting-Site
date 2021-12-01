<?php

include_once "_head.php";
include_once "_nav.php";
require "config.php";
require "connect.php";

$result = [1, 2, 'N', 1, 'N', 2, 1, 1, 2, 'N'];
$points = 0;

if(isset($_POST['bet-form'])){

    for($i = 0; $i < 10; $i++){
        if ($result[$i] == $_POST['match'.$i.'']) {
            $points = $points + 1;
        }
    }

    $betSurname = $_SESSION['surname'];

    $match0 = $_POST['match0'];
    $match1 = $_POST['match1'];
    $match2 = $_POST['match2'];
    $match3 = $_POST['match3'];
    $match4 = $_POST['match4'];
    $match5 = $_POST['match5'];
    $match6 = $_POST['match6'];
    $match7 = $_POST['match7'];
    $match8 = $_POST['match8'];
    $match9 = $_POST['match9'];
    
    $insertBet = 'INSERT INTO bet (match1,match2,match3,match4,match5,match6,match7,match8,match9,match10,surname)
    VALUES(:match0,:match1,:match2,:match3,:match4,:match5,:match6,:match7,:match8,:match9,:surname)';
    $reqInsertBet = $db->prepare($insertBet);
    $reqInsertBet->bindValue(':match0', $match0, PDO::PARAM_STR);
    $reqInsertBet->bindValue(':match1', $match1, PDO::PARAM_STR);
    $reqInsertBet->bindValue(':match2', $match2, PDO::PARAM_STR);
    $reqInsertBet->bindValue(':match3', $match3, PDO::PARAM_STR);
    $reqInsertBet->bindValue(':match4', $match4, PDO::PARAM_STR);
    $reqInsertBet->bindValue(':match5', $match5, PDO::PARAM_STR);
    $reqInsertBet->bindValue(':match6', $match6, PDO::PARAM_STR);
    $reqInsertBet->bindValue(':match7', $match7, PDO::PARAM_STR);
    $reqInsertBet->bindValue(':match8', $match8, PDO::PARAM_STR);
    $reqInsertBet->bindValue(':match9', $match9, PDO::PARAM_STR);
    $reqInsertBet->bindValue(':surname', $betSurname, PDO::PARAM_STR);
    $bet = $reqInsertBet->execute();

    if($bet) {
        // $_SESSION['bet'] = $bet['match1','match2','match3','match4','match5','match6','match7','match8','match9','match10'];
        $_SESSION['bet'] = $bet;
        header('Location:bet-panorama.php');
    }
}



?>
