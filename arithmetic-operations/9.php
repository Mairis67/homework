<?php

//BMI = weight x 703 / height ^ 2

$weight = 76;
$height = 182;

$kgToPounds = $weight * 2.20462;
$cmToInches = $height * 0.393701;

$BMI = $kgToPounds * 703 / pow($cmToInches, 2);


    if ($BMI < 18.5) {
        echo 'You are underweight ' . PHP_EOL;
    } elseif ($BMI < 25) {
        echo "Your' weight is optimal " . PHP_EOL;
    } elseif ($BMI > 25) {
        echo 'You are overweight ' . PHP_EOL;
    }

