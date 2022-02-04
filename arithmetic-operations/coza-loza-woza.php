<?php
$start = 1;
$numbers = 110;

function CozaLozaWoza($numbers, $start): void
{
    while($start < $numbers) {
        for ($i = 1; $i <= 11; $i++) {
            if ($i % 3 === 0 && $i % 5 === 0) {
                echo 'CozaLoza' . ' ';
                $start++;
            } elseif ($i % 3 === 0) {
                echo 'Coza' . ' ';
                $start++;
            } elseif ($i % 5 === 0) {
                echo 'Loza' . ' ';
                $start++;
            } elseif ($i % 7 === 0) {
                echo 'Woza' . ' ';
                $start++;
            } else {
                echo $start . ' ';
                $start++;
            }
        }
        echo PHP_EOL;
    }
}

CozaLozaWoza($numbers, $start) . PHP_EOL;





