<?php

function payslip($pay, $hours) {

    $min_wage = 8;
    $weekly_hours = 40;
    $max_hours = 60;

    if($hours > $max_hours || $pay < $min_wage) {
        print ('Error');
    } elseif ($hours >= $weekly_hours) {
        return $pay * 40 + 1.5 * ($min_wage * ($hours - 40));
    } else {
        print ('Ooops');
    }
}

echo payslip(8.2, 47) . PHP_EOL;

//412