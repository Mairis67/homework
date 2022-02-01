<?php

while(true){

    echo 'GeometryClass' . PHP_EOL . PHP_EOL;
    echo "1. Calculate the Area of a Circle" . PHP_EOL;
    echo "2. Calculate the Area of a Rectangle" . PHP_EOL;
    echo "3. Calculate the Area of a Triangle" . PHP_EOL;
    echo "4. Quit\n";

    $selectedGeometryClass = (int) readline('Enter your choice (1-4): ');

switch ($selectedGeometryClass) {
    case 1: // Circle Area

            $radius = (int) readline('Enter circle radius: ');
            echo PHP_EOL;

            if($radius < 0) {
                echo "Error negative value" . PHP_EOL;
                exit;
            }

            $sumCircle = pi() * $radius * 2;

            echo "Circle area is: " . $sumCircle . PHP_EOL;
            echo "-------------------------------" .PHP_EOL;

        break;
    case 2: // Rectangle Area

        $rLength = (int) readline('Enter rectangle length: ');
        $rHeight = (int) readline('Enter rectangle height: ');
        echo PHP_EOL;

        if($rLength < 0 || $rHeight < 0) {
            echo "Error negative value" . PHP_EOL;
            exit;
        }

        $sumRadius = $rLength * $rHeight;

        echo "Rectangle area is: " . $sumRadius . PHP_EOL;
        echo "-------------------------------" .PHP_EOL;

        break;
    case 3: //Calculate the Area of a Triangle

        $tBase = (int) readline('Enter triangle base: ');
        $tHeight = (int) readline('Enter triangle height: ');
        echo PHP_EOL;

        if($tBase < 0 || $tHeight < 0) {
            echo "Error negative value" . PHP_EOL;
            exit;
        }

        $sumTriangle = $tBase * $tHeight * 0.5;

        echo "Triangle area is " . $sumTriangle . PHP_EOL;
        echo "-------------------------------" .PHP_EOL;

        break;
    case 4: // Quit
        echo 'Thanks for the class' . PHP_EOL;
        exit;
    default:
        echo "Error" . PHP_EOL;
        break;
    }
}

