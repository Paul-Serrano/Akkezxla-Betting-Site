<?php

require_once "connect.php";
require_once "connectExcel.php";

$teamRank = [];
$teamPoints = [];
$teamGoalDiff = [];

for ($i = 7; $i < 27; $i++) {
    array_push($teamRank, $rankingSheet->getCell('AC'.$i.'')->getCalculatedValue());
}

for ($i = 7; $i < 27; $i++) {
    array_push($teamPoints, $rankingSheet->getCell('AD'.$i.'')->getCalculatedValue());
}

for ($i = 7; $i < 27; $i++) {
    array_push($teamGoalDiff, $rankingSheet->getCell('AK'.$i.'')->getCalculatedValue());
}

$resultDay = $gameDay - 1;

try {
    $viewUserBet = "SELECT gameday,surname,match1,match2,match3,match4,match5,match6,match7,match8,match9,match10 From bet Where gameday=".$resultDay."";
    $reqUserBet = $db->prepare($viewUserBet);
    $UserBetSubmit = $reqUserBet->execute();
    $userBet = $reqUserBet->fetchAll();
}

catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}


$resultGameDay = [];

for ($i = ($gameDay - 1)*10 - 3; $i < ($gameDay - 1)*10 + 7; $i++) {
    $scoreHome = $resultSheet->getCell('G'.$i.'')->getValue();
    $scoreAway = $resultSheet->getCell('H'.$i.'')->getValue();
    if($scoreHome < $scoreAway){
        array_push($resultGameDay, "2");
    }
    else if($scoreHome > $scoreAway){
        array_push($resultGameDay, "1");
    }
    else {
        array_push($resultGameDay, "N");
    }
}

$gamedayPoints = 0;
$points = [];

for($j = 0; $j < count($userBet) ; $j++) {
    for ($i = 1; $i < 11; $i++) {
        if($resultGameDay[$i - 1] == $userBet[$j]["match".$i.""]) {
            $gamedayPoints++;
        }
    }
    array_push($points, [$userBet[$j]['gameday'], $userBet[$j]['surname'], $gamedayPoints]);
    $gamedayPoints = 0;
}

try {
    $getSurname = "SELECT surname FROM bet";
    $reqGetSurname = $db->prepare($getSurname);
    $SubmitGetSurname = $reqGetSurname->execute();
    $userBetSurname = $reqGetSurname->fetchAll();
}

catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

try {
    $getScore = 'SELECT surname,points FROM score';
    $reqGetScore = $db->prepare($getScore);
    $SubmitGetScore = $reqGetScore->execute();
    $userBetScore = $reqGetScore->fetchAll();
}

catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

try {
    $checkTotalScore = "SELECT * FROM totalscore";
    $reqCheckTotalScore = $db->prepare($checkTotalScore);
    $submitCheckTotalScore = $reqCheckTotalScore->execute();
    $checkTotalScore = $reqCheckTotalScore->fetchAll();
}

catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

try {
    $sqlCheckTotalScore = "SELECT * FROM totalscore";
    $reqCheckTotalScore = $db->prepare($sqlCheckTotalScore);
    $submitCheckTotalScore = $reqCheckTotalScore->execute();
    $checkTotalScore = $reqCheckTotalScore->fetchAll();
}

catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

if(isset($_POST['next-gameday'])) {
    
    for($i = 0; $i < count($userBet); $i++) {
        try {
            $sendPoints = "INSERT INTO score (gameday, surname, points) VALUES (:gameday, :surname, :points)";
            $reqSendPoints = $db->prepare($sendPoints);
            $reqSendPoints->bindValue(':gameday', $points[$i][0], PDO::PARAM_STR);
            $reqSendPoints->bindValue(':surname', $points[$i][1], PDO::PARAM_STR);
            $reqSendPoints->bindValue(':points', $points[$i][2], PDO::PARAM_STR);
            $submitSendPoints = $reqSendPoints->execute();
        }

        catch (PDOException $e) {
            $db = null;
            echo 'Erreur : '.$e->getMessage();
        } 
    }

    // for($i = 0; $i < count($userPoints); $i++) {
    //     try {
    //         $sendTotalPoints = "UPDATE totalscore SET surname=:surname, totalScore=:totalScore";
    //         $reqSendTotalPoints = $db->prepare($sendTotalPoints);
    //         $reqSendTotalPoints->bindValue(':surname', $userPoints[$i][0], PDO::PARAM_STR);
    //         $reqSendTotalPoints->bindValue(':totalScore', $userPoints[$i][1], PDO::PARAM_STR);
    //         $submitSendTotalPoints = $reqSendTotalPoints->execute();
    //     }

    //     catch (PDOException $e) {
    //         $db = null;
    //         echo 'Erreur : '.$e->getMessage();
    //     }
    // }

    header('Location:ranking.php');
}

try {
    $getTotalScore = "SELECT * FROM totalscore ORDER BY totalScore DESC";
    $reqGetTotalScore = $db->prepare($getTotalScore);
    $submitGetTotalScore = $reqGetTotalScore->execute();
    $totalScore = $reqGetTotalScore->fetchAll();
}



catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

$players = [];

for($i = 0; $i < count($userBetSurname); $i++) {
    if(!in_array($userBetSurname[$i]['surname'], $players)){
        array_push($players, $userBetSurname[$i]['surname']);
    }
}

$playersNumber = count($players);
$betNumber = 0;

for($j = 0; $j < $playersNumber; $j++) {
    for($i = 0; $i < count($userBetScore); $i++) {

    }

}

$userPoint = 0;
$userPoints = [];
$arrayTest = [];

for($i = 0; $i < $playersNumber; $i++){
    for($j = 0; $j < count($userBetScore); $j++) {
        if($players[$i] == $userBetScore[$j]['surname']){
            $userPoint = $userPoint + $userBetScore[$j]['points'];
        }
        if($userBetScore[$j]['surname'] == $players[$i]){
            $betNumber++;  
        }
    }
    array_push($userPoints, [$players[$i], $userPoint, $betNumber]);
    $userPoint = 0;
    $allBetNumber[$i] = $betNumber;
    $betNumber = 0;
}


$userRatio = [];
for($j = 0; $j < $playersNumber; $j++) {
    if( $userPoints[$j][2] > 0) {
        $userRatio[$j] = $userPoints[$j][1] / $userPoints[$j][2];
    }
    else {
        $userRatio[$j] = 0;
    }
    array_push($userPoints[$j], $userRatio[$j]);
}

$userRanking = [];
$maxUserPoints = 0;

for($j = 0; $j < $playersNumber; $j++) {
    for($i = 0; $i < count($userPoints); $i++) {
        if($userPoints[$i][1] >= $maxUserPoints) {
            $maxUserPoints = $userPoints[$i][1];
            $userRanking[$j] = $userPoints[$i];
            $startSplice = $i;
        }
    }
    array_splice($userPoints, $startSplice, 1);
    $maxUserPoints = 0;
}






?>