<?php

$file = file_get_contents('arrays/tic-tac-toe/gamefield.txt');

$gameField = [];
$combinations = [];

[$gameFieldBase, $combinationBase] = explode('@', $file);

foreach (explode(':', $gameFieldBase) as $rowNumber => $fieldRow)
{
    foreach (explode(',', $fieldRow) as $item)
    {
        $gameField[$rowNumber][] = $item;
    }
}

foreach (explode(':', $combinationBase) as $combinationNumber => $combination)
{
    foreach (explode(';', $combination) as $coordsIndex => $coords)
    {
        [$x, $y] = explode(',', $coords);
        $combinations[$combinationNumber][$coordsIndex] = [(int) $x, (int) $y];
    }
}

//$gameField = [
//    ['-', '-', '-'],
//    ['-', '-', '-'],
//    ['-', '-', '-']
//];

$player1 = readline('Please enter player one symbol: ');
$player2 = readline('Please enter player two symbol: ');

$activePlayer = $player1;

//$combinations = [
//    [
//        [0, 0], [0, 1], [0, 2]
//    ],
//    [
//        [1, 0], [1, 1], [1, 2]
//    ],
//    [
//        [2, 0], [2, 1], [2, 2]
//    ],
//    [
//        [0, 0], [1, 0], [2, 0],
//    ],
//    [
//        [0, 1], [1, 1], [2, 1]
//    ],
//    [
//        [0, 2], [1, 2], [2, 2]
//    ],
//    [
//        [0, 0], [1, 1], [2, 2]
//    ],
//    [
//        [0, 2], [1, 1], [2, 0]
//    ]
//];

function checkWinner(array $combinations, array $gameField, string $activePlayer): bool
{
    foreach ($combinations as $combination) {
        foreach ($combination as $item)
        {
            [$row, $column] = $item;
            if ($gameField[$row][$column] !== $activePlayer) {
                break;
            }

            if (end($combination) === $item) {
                return true;
            }
        }
    }

    return false;
}

function isGameFieldFull(array $gameField): bool
{
    foreach ($gameField as $row) {
        if (in_array('-', $row)) return false;
    }
    return true;
}

while (!isGameFieldFull($gameField) && !checkWinner($combinations, $gameField, $activePlayer)) {

    foreach ($gameField as $item)
    {
        foreach ($item as $value) {
            echo " $value ";
        }
        echo PHP_EOL;
    }

    echo 'Player ' . $activePlayer . ' ';
    $position = readline('Enter position: ');

    [$row, $column] = explode(',', $position);

    if (!isset($gameField[$row][$column]) || $gameField[$row][$column] !== '-') {
        echo 'Invalid position.' . PHP_EOL;
        continue;
    }

    $gameField[$row][$column] = $activePlayer;

    if (checkWinner($combinations, $gameField, $activePlayer))
    {
        echo 'Winner is ' . $activePlayer. PHP_EOL;
        exit;
    }

    $activePlayer = $player1 === $activePlayer ? $player2 : $player1;
}

echo 'The game was tied.' . PHP_EOL;
