<?php

include_once "_head.php";
include_once "_nav.php";
require_once "Classes/PHPExcel.php";

$path="Fichier-Excel-Ligue-1-2021-2022.ods";
$reader= PHPExcel_IOFactory::createReaderForFile($path);
$excel_Obj = $reader->load($path);

$rankingSheet = $excel_Obj->getSheet('3');
$resultSheet = $excel_Obj->getSheet('1');

// for($i = 7; $i < 27; $i++){
//     echo $rankingSheet->getCell('AC'.$i.'')->getCalculatedValue().' ';
// }

// $scoreColumn = PHPExcel_Cell::columnIndexFromString($resultSheet->getCell('G7')->getColumn());
// echo $scoreColumn;

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

?><pre><?php
var_dump($ticket1);
?></pre>

?><pre><?php
var_dump($ticket2);
?></pre>

<body>
    <main>
        <section>
            <div class="form-container">
                <form class="form" action="bet_post.php" method="POST">
                    <h4>Game Day <?php echo $gameDay; ?></h4>
                    <div class="form-content">
                        <div class="ticket" id="ticket1">
                        <div class="match-block">
                                <p class="match"></p>
                                <div class="bet-block">
                                    <input id="match0-1" name="match0" type="radio" value="1" />
                                    <label for="match0-1">
                                        <p>1</p>
                                    </label>
                                    <input id="match0-N" name="match0" type="radio" value="N" />
                                    <label for="match0-N">
                                        <p>Nul</p>
                                    </label>
                                    <input id="match0-2" name="match0" type="radio" value="2" />
                                    <label for="match0-2">
                                        <p>2</p>
                                    </label>
                                </div>
                            </div>
                            <div class="match-block">
                                <p class="match">Paris -- Marseille</p>
                                <div class="bet-block">
                                    <input id="match1-1" name="match1" type="radio" value="1" />
                                    <label for="match1-1">
                                        <p>1</p>
                                    </label>
                                    <input id="match1-N" name="match1" type="radio" value="N" />
                                    <label for="match1-N">
                                        <p>Nul</p>
                                    </label>
                                    <input id="match1-2" name="match1" type="radio" value="2" />
                                    <label for="match1-2">
                                        <p>2</p>
                                    </label>
                                </div>
                            </div>
                            <div class="match-block">
                                <p class="match">Paris -- Marseille</p>
                                <div class="bet-block">
                                    <input id="match2-1" name="match2" type="radio" value="1" />
                                    <label for="match2-1">
                                        <p>1</p>
                                    </label>
                                    <input id="match2-N" name="match2" type="radio" value="N" />
                                    <label for="match2-N">
                                        <p>Nul</p>
                                    </label>
                                    <input id="match2-2" name="match2" type="radio" value="2" />
                                    <label for="match2-2">
                                        <p>2</p>
                                    </label>
                                </div>
                            </div>
                            <div class="match-block">
                                <p class="match">Paris -- Marseille</p>
                                <div class="bet-block">
                                    <input id="match3-1" name="match3" type="radio" value="1" />
                                    <label for="match3-1">
                                        <p>1</p>
                                    </label>
                                    <input id="match3-N" name="match3" type="radio" value="N" />
                                    <label for="match3-N">
                                        <p>Nul</p>
                                    </label>
                                    <input id="match3-2" name="match3" type="radio" value="2" />
                                    <label for="match3-2">
                                        <p>2</p>
                                    </label>
                                </div>
                            </div>
                            <div class="match-block">
                                <p class="match">Paris -- Marseille</p>
                                <div class="bet-block">
                                    <input id="match4-1" name="match4" type="radio" value="1" />
                                    <label for="match4-1">
                                        <p>1</p>
                                    </label>
                                    <input id="match4-N" name="match4" type="radio" value="N" />
                                    <label for="match4-N">
                                        <p>Nul</p>
                                    </label>
                                    <input id="match4-2" name="match4" type="radio" value="2" />
                                    <label for="match4-2">
                                        <p>2</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="final-bet">
                            <div class="result-bet"></div>
                        </div>
                        <div class="ticket" id="ticket2">
                            <div class="match-block">
                                <p class="match">Paris -- Marseille</p>
                                <div class="bet-block">
                                    <input id="match5-1" name="match5" type="radio" value="1" />
                                    <label for="match5-1">
                                        <p>1</p>
                                    </label>
                                    <input id="match5-N" name="match5" type="radio" value="N" />
                                    <label for="match5-N">
                                        <p>Nul</p>
                                    </label>
                                    <input id="match5-2" name="match5" type="radio" value="2" />
                                    <label for="match5-2">
                                        <p>2</p>
                                    </label>
                                </div>
                            </div>
                            <div class="match-block">
                                <p class="match">Paris -- Marseille</p>
                                <div class="bet-block">
                                    <input id="match6-1" name="match6" type="radio" value="1" />
                                    <label for="match6-1">
                                        <p>1</p>
                                    </label>
                                    <input id="match6-N" name="match6" type="radio" value="N" />
                                    <label for="match6-N">
                                        <p>Nul</p>
                                    </label>
                                    <input id="match6-2" name="match6" type="radio" value="2" />
                                    <label for="match6-2">
                                        <p>2</p>
                                    </label>
                                </div>
                            </div>
                            <div class="match-block">
                                <p class="match">Paris -- Marseille</p>
                                <div class="bet-block">
                                    <input id="match7-1" name="match7" type="radio" value="1" />
                                    <label for="match7-1">
                                        <p>1</p>
                                    </label>
                                    <input id="match7-N" name="match7" type="radio" value="N" />
                                    <label for="match7-N">
                                        <p>Nul</p>
                                    </label>
                                    <input id="match7-2" name="match7" type="radio" value="2" />
                                    <label for="match7-2">
                                        <p>2</p>
                                    </label>
                                </div>
                            </div>
                            <div class="match-block">
                                <p class="match">Paris -- Marseille</p>
                                <div class="bet-block">
                                    <input id="match8-1" name="match8" type="radio" value="1" />
                                    <label for="match8-1">
                                        <p>1</p>
                                    </label>
                                    <input id="match8-N" name="match8" type="radio" value="N" />
                                    <label for="match8-N">
                                        <p>Nul</p>
                                    </label>
                                    <input id="match8-2" name="match8" type="radio" value="2" />
                                    <label for="match8-2">
                                        <p>2</p>
                                    </label>
                                </div>
                            </div>
                            <div class="match-block">
                                <p class="match">Paris -- Marseille</p>
                                <div class="bet-block">
                                    <input id="match9-1" name="match9" type="radio" value="1" />
                                    <label for="match9-1">
                                        <p>1</p>
                                    </label>
                                    <input id="match9-N" name="match9" type="radio" value="N" />
                                    <label for="match9-N">
                                        <p>Nul</p>
                                    </label>
                                    <input id="match9-2" name="match9" type="radio" value="2" />
                                    <label for="match9-2">
                                        <p>2</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" name="" class="btn btn-light bet-btn">Submit your bet !</button>
                </form>
            </div>
        </section>
    </main>
    <script src="script.js"></script>
</body>

</html>