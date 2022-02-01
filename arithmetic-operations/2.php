<?php

function CheckOddEven($a)
{
    if($a % 2 !== 0) {
        echo 'Odd Number';
    } else {
        echo 'Even Number';
        exit(' bye!');
    }
    return ($a);
}

echo CheckOddEven(2);

