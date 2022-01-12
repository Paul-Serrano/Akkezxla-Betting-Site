<?php 

require_once "connect.php";
require_once "config.php";
require_once 'phpspreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$inputFileName = 'calendar.ods';

$ligue1File = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);

$resultSheet = $ligue1File->getSheet(0);

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

$resultDay = 1;

if(!empty($result)) {
    for($i = 0; $i < count($result); $i++) {
        if($result[$i]['gameday'] > $resultDay) {
            $resultDay = $result[$i]['gameday'];
            $gameDay = $resultDay + 1;
        }
    }
}
else {
    $resultDay = 20;
    $gameDay = $resultDay + 1;
}


$ticket1 = [];
$ticket2 = [];

for($i = -8 + $gameDay*10; $i < -3 + $gameDay*10; $i++) {
    array_push($ticket1, [$resultSheet->getCell('A'.$i.'')->getValue(), $resultSheet->getCell('B'.$i.'')->getValue()]);
}

for($i = -3 + $gameDay*10; $i < 2 + $gameDay*10; $i++) {
    array_push($ticket2, [$resultSheet->getCell('A'.$i.'')->getValue(), $resultSheet->getCell('B'.$i.'')->getValue()]);
}

?>
