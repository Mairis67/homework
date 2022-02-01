<?php

class FuelGauge
{
    private int $currentFuel = 0;
    private const FUEL_CAPACITY = 70;

    public function __construct(int $amount)
    {
        $this->changeFuel($amount);
    }

    public function getCurrentFuel(): int
    {
        return $this->currentFuel;
    }

    public function changeFuel(int $amount): void
    {
        $this->currentFuel += $amount;

        if ($this->currentFuel > self::FUEL_CAPACITY) {
            $this->currentFuel = self::FUEL_CAPACITY;
        }

        if ($this->currentFuel < 0) {
            $this->currentFuel = 0;
        }
    }
}

class Odometer
{
    private int $currentMileage = 0;

    public function getCurrentMileage(): int
    {
        return $this->currentMileage;
    }

    public function incrementMileage(int $amount): void
    {
        $this->currentMileage += $amount;
    }
}

class Car
{
    private FuelGauge $fuel;
    private Odometer $odometer;

    public function __construct(FuelGauge $fuel, Odometer $odometer)
    {
        $this->fuel = $fuel;
        $this->odometer = $odometer;
    }

    public function burnFuel(): void
    {
        if($this->fuel->getCurrentFuel() < 0) return;

            $this->fuel->changeFuel(-1);
            $this->odometer->incrementMileage(10);
    }
}

$fuel = new FuelGauge(20);
$odometer = new Odometer();
$car = new Car($fuel, $odometer);

while ($fuel->getCurrentFuel() > 0) {

    echo 'Fuel left: ' . $fuel->getCurrentFuel() . PHP_EOL;
    echo 'Current mileage: ' . $odometer->getCurrentMileage(). PHP_EOL;

    $car->burnFuel();
}
