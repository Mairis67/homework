<?php

$choices = ['rock', 'paper', 'scissors', 'spock', 'lizard'];

$playerOne = readline('Enter your choice: ');
$pcPlayer = $choices[array_rand($choices)];

echo "$playerOne VS $pcPlayer" . PHP_EOL;

$combinations = [
    'rock' => ['scissors', 'lizard'],
    'paper' => ['rock', 'spock'],
    'scissors' => ['paper', 'lizard'],
    'spock' => ['rock', 'scissors'],
    'lizard' => ['spock', 'paper']
];

    if($playerOne === $pcPlayer) {
        echo "It's a tie!" . PHP_EOL;
        exit;
    }

    echo (in_array($pcPlayer, $combinations[$playerOne])) ?  'You WIN!!!' :  'You lost';
    echo PHP_EOL;


