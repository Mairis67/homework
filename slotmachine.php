<?php

$money = (int) readline('Please insert cash: ');
$spinCost = (int) readline('Please choose spin cost: ');
$options = ['A', 'B', 'C'];

$chanceToWin = [
    'A' => 5,
    'B' => 10,
    'C' => 15
];

$fieldRows = 3;
$fieldColumns = 3;
$field = array_fill(0, $fieldRows, array_fill(0, $fieldColumns, '-'));

$combinations =
    [
        [
            [0, 0], [0, 1], [0, 2]
        ],
        [
            [1, 0], [1, 1], [1, 2]
        ],
        [
            [2, 0], [2, 1], [2, 2]
        ],
        [
            [2, 0], [1, 1], [0, 2]
        ],
        [
            [0, 0], [1, 1], [2, 2]
        ],

    ];

function displayField(array $field): void
{
    foreach ($field as $value) {
        foreach ($value as $item) {
            echo  " $item " ;
        }
        echo PHP_EOL;
    }
}

function checkWinner(array $combinations, array $field): array
{
    $combinationBoard = [];

    foreach ($combinations as $key => $combination)
    {
        foreach ($combination as $index => $item)
        {
            [$row, $column] = $item;
            $combinationBoard[$key][$index] = $field[$row][$column];
        }
    }
    $winnerOptions = [];
    foreach ($combinationBoard as $combination)
    {
        if(count(array_unique($combination)) === 1)
        {
            $winnerOptions[] = $combination[0];
        }
    }
    return $winnerOptions;
}

function winnerCash(array $winningLines, array $chanceToWin, int $spinCost): int
{
    $wonAmount = 0;
    foreach ($winningLines as $item) {
        switch ($item) {
            case 'A':
                $wonAmount += $chanceToWin['A'] * $spinCost;
                break;
            case 'B':
                $wonAmount += $chanceToWin['B'] * $spinCost;
                break;
            case 'C':
                $wonAmount += $chanceToWin['C'] * $spinCost;
                break;
            default:
                break;
        }
    }
    return $wonAmount;
}

while (true)
{
    echo 'You have' . $money . ' $' . PHP_EOL;
    echo '{1} Play' . PHP_EOL;
    echo '{2} Change spin cost' . PHP_EOL;
    echo '{3} Exit' . PHP_EOL;

    $option = (int) readline('Please choose: ');

    switch ($option)
    {
        case 1:
            if($spinCost <= $money) {
                foreach ($field as $rowIndex => $item) {
                    foreach ($item as $columnIndex => $value) {
                        $field[$rowIndex][$columnIndex] = $options[array_rand($options)];
                    }
                }
                displayField($field);
                $money -= $spinCost;

                $winner = checkWinner($combinations, $field);

                if(sizeof($winner) > 0) {
                    $playerWon = winnerCash($winner, $chanceToWin, $spinCost);
                    $money += $playerWon;
                    echo 'You won ' . $playerWon . ' $' . PHP_EOL;
                } else {
                    echo 'Sorry you lost' . PHP_EOL;
                }
            } else {
                echo 'Not enough money' . PHP_EOL;
            }
            break;

        case 2:
            echo 'You have ' . $money . ' $' . PHP_EOL;

            $changeSpinCost = (int) readline('Change spin cost: ');
            if($changeSpinCost <= $money) {
                $spinCost = $changeSpinCost;
                echo 'Spin cost changed to ' . $spinCost . PHP_EOL;
            } else {
                echo 'Sorry not enough money' . PHP_EOL;
            }
            break;

        default:
            echo 'Thank you for playing' . PHP_EOL;
            exit;
    }
}