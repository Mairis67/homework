<?php

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

for($i = 1; $i <= $numbers; $i++) {
    $divided = ($numbers % 3 === 0);
    echo $divided;
}
