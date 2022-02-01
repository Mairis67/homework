<?php

echo "I'm thinking of a number between 1-100. Try to guess it!\n";

function GuessNumber()
{
    $num = rand(1, 100);

    $guess = readline("You're number: ");
    $guess = intval($guess);

    echo "I was thinking of $num. You guessed $guess\n";

    if ($guess > $num){
       echo "Sorry, you are too high. I was thinking of $num.\n";
    } elseif ($guess < $num) {
        echo "Sorry, you are too low. I was thinking of $num.\n";
    } elseif ($guess === $num) {
        echo"You guessed it! What are the odds?!?";
    } else {
        echo "Please enter a number!\n";
    }
    exit(' ');
}

echo GuessNumber();