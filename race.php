<?php

$players = ['M', 'L', 'A', 'J'];

$numOfPlayers = count($players);

$raceLength = 15;

$winners = [];

$run = array_fill(0, $numOfPlayers, array_fill(0, $raceLength, '_'));


$chooseWinner = readline('Choose winner: ');
$betting = (int)readline('Please place bet: ');

while (true) {

    echo "{1} Play game: " . PHP_EOL;
    echo "{2} Exit game: " . PHP_EOL;

    $option = (int)readline('Select option: ');


    switch ($option) {

        case 1:

//            foreach ($players as $player) {
//                if ($player === $chooseWinner) {
//                    echo 'You selected: ' . $player . PHP_EOL;
//                } else {
//                    echo 'Sorry no player by that name' . PHP_EOL;
//                    exit;
//                }
//            }

            for ($i = 0; $i < $numOfPlayers; $i++) {
                $run[$i][0] = 'O';
            }

            for ($j = 0; $j < 14; $j++) {
                echo '=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=' . PHP_EOL;
                foreach ($run as $key => $display) {
                    echo "Player {" . $players[$key] . "} ";
                    foreach ($display as $displayAll) {
                        echo " $displayAll";
                    }
                    echo PHP_EOL . PHP_EOL;
                }
                echo '=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=' . PHP_EOL;
                sleep(1);

                foreach ($run as $index => $move) {
                    $playerLocation = array_search('O', $move);
                    if ($playerLocation === 14) {
                        $winners[$j][] = $players[$index];
                        continue;
                    }
                    if ($playerLocation === 13) {
                        $nextMove = $playerLocation + 1;
                    } else {
                        $nextMove = $playerLocation + rand(1, 2);
                    }
                    $run[$index][$nextMove] = 'O';
                    $run[$index][$playerLocation] = '_';
                }
            }

            foreach ($winners as $key => $winner) {
                foreach ($winner as $index => $placement) {
                    if ($index === 0) {
                        echo 'First place: ' . $players[$index] . PHP_EOL;
                    } elseif ($index === 1) {
                        echo 'Second place: ' . $players[$index] . PHP_EOL;
                    } elseif ($index === 2) {
                        echo 'Third place: ' . $players[$index] . PHP_EOL;
                    }
                }
            }
            break;

        case 2:
            exit;
    }
}








