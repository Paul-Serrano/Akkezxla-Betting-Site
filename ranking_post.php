<?php

require_once "connect.php";
require_once "connectExcel.php";

try {
    $getResult = "SELECT * FROM result";
    $reqGetResult = $db->prepare($getResult);
    $SubmitGetResult = $reqGetResult->execute();
    $result = $reqGetResult->fetchAll();
}

catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

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

$ticket1Points = 0;
$ticket2Points = 0;
$points = [];

if(count($result) != 0) {
    for($i = 1; $i < 6; $i++) {
        $result1['result'][$i] = $result[count($result) - 1]['match'.$i.''];
    }
    
    for($i = 1; $i < 6; $i++) {
        $j = $i + 5;
        $result2['result'][$i] = $result[count($result) - 1]['match'.$j.''];
    }

    for($j = 0; $j < count($userBet) ; $j++) {
        for ($i = 1; $i < 6; $i++) {
            if($result1['result'][$i] == $userBet[$j]["match".$i.""]) {
                $ticket1Points++;
            }
        }
        for ($i = 1; $i < 6; $i++) {
            $k = $i + 5;
            if($result2['result'][$i] == $userBet[$j]["match".$k.""]) {
                $ticket2Points++;
            }
        }
        $gamedayPoints = $ticket1Points + $ticket2Points;
        array_push($points, [$userBet[$j]['gameday'], $userBet[$j]['surname'], $gamedayPoints, $ticket1Points, $ticket2Points]);
        $gamedayPoints = 0;
        $ticket1Points = 0;
        $ticket2Points = 0;
    }
}

if(isset($_POST['update-score'])) {
    
    for($i = 0; $i < count($userBet); $i++) {
        try {
            $sendPoints = "INSERT INTO score (gameday, surname, points, ticket1, ticket2) VALUES (:gameday, :surname, :points, :ticket1, :ticket2)";
            $reqSendPoints = $db->prepare($sendPoints);
            $reqSendPoints->bindValue(':gameday', $points[$i][0], PDO::PARAM_STR);
            $reqSendPoints->bindValue(':surname', $points[$i][1], PDO::PARAM_STR);
            $reqSendPoints->bindValue(':points', $points[$i][2], PDO::PARAM_STR);
            $reqSendPoints->bindValue(':ticket1', $points[$i][3], PDO::PARAM_STR);
            $reqSendPoints->bindValue(':ticket2', $points[$i][4], PDO::PARAM_STR);
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

if(isset($_POST['update-result'])) {
    try {
        $insertResult = "INSERT INTO result (gameday, match1, match2, match3, match4, match5, match6, match7, match8, match9, match10)
        VALUES (:gameday, :match1, :match2, :match3, :match4, :match5, :match6, :match7, :match8, :match9, :match10)";
        $reqInsertResult = $db->prepare($insertResult);
        $reqInsertResult->bindValue(':gameday', $gameDay, PDO::PARAM_STR);
        $reqInsertResult->bindValue(':match1', $_POST['match0'], PDO::PARAM_STR);
        $reqInsertResult->bindValue(':match2', $_POST['match1'], PDO::PARAM_STR);
        $reqInsertResult->bindValue(':match3', $_POST['match2'], PDO::PARAM_STR);
        $reqInsertResult->bindValue(':match4', $_POST['match3'], PDO::PARAM_STR);
        $reqInsertResult->bindValue(':match5', $_POST['match4'], PDO::PARAM_STR);
        $reqInsertResult->bindValue(':match6', $_POST['match5'], PDO::PARAM_STR);
        $reqInsertResult->bindValue(':match7', $_POST['match6'], PDO::PARAM_STR);
        $reqInsertResult->bindValue(':match8', $_POST['match7'], PDO::PARAM_STR);
        $reqInsertResult->bindValue(':match9', $_POST['match8'], PDO::PARAM_STR);
        $reqInsertResult->bindValue(':match10', $_POST['match9'], PDO::PARAM_STR);
        $submitSendResult = $reqInsertResult->execute();
    }

    catch (PDOException $e) {
        $db = null;
        echo 'Erreur : '.$e->getMessage();
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