<?php

$numbers = 100;

function CozaLozaWoza($numbers)
{
    for($i = 1; $i <= $numbers; $i++) {
            if ($i % 3 === 0 && $i % 5 === 0) {
                echo 'CozaLoza' . PHP_EOL;
            } elseif ($i % 3 === 0) {
                echo 'Coza' . PHP_EOL;
            } elseif ($i % 5 === 0) {
                echo 'Loza' . PHP_EOL;
            } elseif ($i % 7 === 0) {
                echo 'Woza' . PHP_EOL;
            } else {
                echo $i . PHP_EOL;
            }
    }
    return $numbers;
}

echo CozaLozaWoza($numbers) . PHP_EOL;





