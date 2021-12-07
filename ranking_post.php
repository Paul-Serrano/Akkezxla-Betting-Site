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

$userPoints = 0;
    $points = [];

for($j = 0; $j < count($userBet) ; $j++) {
    for ($i = 1; $i < 11; $i++) {
        if($resultGameDay[$i - 1] == $userBet[$j]["match".$i.""]) {
            $userPoints++;
        }
    }
    array_push($points, [$userBet[$j]['gameday'], $userBet[$j]['surname'], $userPoints]);
    $userPoints = 0;
}

if(isset($_POST['next-gameday'])) {
    
    for($i = 0; $i < count($userBet); $i++) {
        $sendPoints = "INSERT INTO score (gameday, surname, points) VALUES (:gameday, :surname, :points)";
        $reqSendPoints = $db->prepare($sendPoints);
        $reqSendPoints->bindValue(':gameday', $points[$i][0], PDO::PARAM_STR);
        $reqSendPoints->bindValue(':surname', $points[$i][1], PDO::PARAM_STR);
        $reqSendPoints->bindValue(':points', $points[$i][2], PDO::PARAM_STR);
        $submitSendPoints = $reqSendPoints->execute();
    }
    


    header('Location:ranking.php');
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

$players = [];

for($i = 0; $i < count($userBetSurname); $i++) {
    if(!in_array($userBetSurname[$i]['surname'], $players)){
        array_push($players, $userBetSurname[$i]['surname']);
    }
}

$playersNumber = count($players);

$userPoint = 0;
$userPoints = [];

for($i = 0; $i < $playersNumber; $i++){
    for($j = 0; $j < count($userBetScore); $j++) {
        if($userBetScore[$j]['surname'] == $players[$i]){
            $userPoint = $userPoint + $userBetScore[$j]['points'];
        }
    }
    $userTotalScore = [$players[$i], $userPoint];
    array_push($userPoints, $userTotalScore);
    $userPoint = 0;
}

$maxPoints = 0;
$userPointsOrder = [];


// for($j = count($userPoints) - 1; $j > -1; $j--){
//     for($i = 0; $i < count($userPoints); $i++){
//         if($userPoints[$i][1] >= $maxPoints) {
//             $maxPoints = $userPoints[$i][1];
//             $userMaxPoints = $userPoints[$i][0];
//         }
//     }
//     $userPoints[$j] = [$userMaxPoints, $maxPoints];
    // array_push($userPointsOrder, $maxPoints);
    // unset($userPoints[array_search($maxPoints, $userPoints)]);
// }




?>