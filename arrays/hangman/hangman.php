<?php

$words = explode(',', file_get_contents('arrays/hangman/list.txt'));
$randomWord = $words[array_rand($words)];
$maxAttempts = 7;
$letters = str_split($randomWord);
$showLetters = [];
var_dump($randomWord);

foreach ($letters as $letter)
{
    $showLetters[] = '_';
}

$showWord = implode('', $showLetters);


function showMissedWords ($missed)
{
    foreach ($missed as $miss) {
        echo $miss;
    }
}

$missed = [];

while(true) {

    echo '-=-=-=-=-=-=-=-=-=-=-=-=-' . PHP_EOL;
    echo "Word: " . $showWord . PHP_EOL;
    echo  showMissedWords($missed) . PHP_EOL;

    $guess = readline('Guess: ');

    if(strpos($showWord, '_') === false)
    {
        echo 'Yes you did it' . PHP_EOL;
        break;
    }

    for ($i = 0; $i < count($letters); $i++) {

        if ($guess === $letters[$i]){
            $correctLetter = $showWord[$i] = $guess;
        }
    }

    if(!strpos($showWord, $guess) === true)
    {
        $missed[] = $guess;
    }

    if(count($missed) > $maxAttempts){
        echo 'Sorry you lost' . PHP_EOL;
        break;
    }
}

















