<?php 

require_once 'phpspreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$inputFileName = 'Fichier-Excel-Ligue-1-2021-2022.ods';

$ligue1File = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);

$rankingSheet = $ligue1File->getSheet(3);
$resultSheet = $ligue1File->getSheet(1);


for($i = 7; $i < 387; $i = $i+10) {
    $scoreColumn[$i] = $resultSheet->getCell('K'.$i.'')->getCalculatedValue();
    if ($scoreColumn[$i] == "Non joué") {
        $gameDay = $resultSheet->getCell('A'.$i.'')->getValue();
        break;
    }
}

for($i = -3 + $gameDay*10; $i < 2 + $gameDay*10; $i++) {
    $ticket1[$i] = [$resultSheet->getCell('F'.$i.'')->getValue(), $resultSheet->getCell('I'.$i.'')->getValue()];
}

for($i = 2 + $gameDay*10; $i < 7 + $gameDay*10; $i++) {
    $ticket2[$i] = [$resultSheet->getCell('F'.$i.'')->getValue(), $resultSheet->getCell('I'.$i.'')->getValue()];
}

?>