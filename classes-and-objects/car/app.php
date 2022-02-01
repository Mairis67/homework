<?php

require_once 'classes-and-objects/car/Battery.php';
require_once 'classes-and-objects/car/FuelGauge.php';
require_once 'classes-and-objects/car/Lights.php';
require_once 'classes-and-objects/car/Odometer.php';
require_once 'classes-and-objects/car/Tire.php';
require_once 'classes-and-objects/car/Car.php';

$name = readline('Car name: ');
$fuelGaugeAmount = (int) readline('Fuel Gauge amount: ');
$driveDistance = (int) readline('Drive distance: ');

$car = new Car($name, 1234, $fuelGaugeAmount);

echo "------ " . $car->getName() . " ------";
echo PHP_EOL;

$pinCode = (int) readline('Enter car pin code: ');
echo PHP_EOL;
$car->start($pinCode);

if(!$car->hasStarted()) {
    echo "{$car->getName()} has not started!";
    echo PHP_EOL;
}

while ($car->getFuel() > 0 && $car->hasValidTires() && $car->hasValidLights() && $car->hasStarted()) {
    echo "Fuel: " . $car->getFuel() . "l" . PHP_EOL;
    echo "Mileage: " . $car->getMileage() . "km" . PHP_EOL;
    echo "Battery: " . $car->getBattery() . "%" . PHP_EOL;
    foreach ($car->getTires() as $tire) {
        echo "Tire({$tire->getName()}): " . $tire->getCondition() . "%" . PHP_EOL;
    }
    foreach ($car->getLights() as $light) {
        echo "Light({$light->getLightName()})" . $light->getLightCondition() . "%" . PHP_EOL;
    }

    $car->drive($driveDistance);

    sleep(1);
}
