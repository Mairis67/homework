<?php

function number (int $a, int $b): int
{
    return $a === 15 || $b === 15 || $a + $b === 15;
}

var_dump(number(10, 15));

