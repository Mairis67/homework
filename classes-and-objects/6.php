<?php

class EnergyDrink
{

    private int $surveyed = 12467;
    private float $purchasedEnergyDrinks = 0.14;
    private float $preferCitrusDrinks = 0.64;

    function calculateEnergyDrinkers(int $numberSurveyed): int
    {
        return round($numberSurveyed * $this->purchasedEnergyDrinks);

    }

    function calculatePreferCitrus(int $numberSurveyed): int
    {
        return round($numberSurveyed * $this->preferCitrusDrinks);
    }

    public function getSurveyed(): int
    {
        return $this->surveyed;
    }
}

$surveyed = new EnergyDrink();

echo "Total number of people surveyed: " . $surveyed->getSurveyed() . PHP_EOL;
echo "Approximately " . $surveyed->calculateEnergyDrinkers($surveyed->getSurveyed()) .
    " bought at least one energy drink" . PHP_EOL;
echo $surveyed->calculatePreferCitrus($surveyed->calculateEnergyDrinkers($surveyed->getSurveyed())) .
    " of those prefer citrus flavored energy drinks." . PHP_EOL;
