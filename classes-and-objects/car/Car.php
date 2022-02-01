<?php

class Car
{
    private string $name;
    private FuelGauge $fuelGauge;
    private Odometer $odometer;
    private Battery $battery;

    private const CONSUMPTION_PER_KM = 0.07; // 7L on 100km
    private const TIRE_QUALITY_LOSS_PER_KM = [1, 2];
    private const LIGHTS_QUALITY_LOSS_PER_KM = [1, 3];

    private array $tires;
    private array $lights;
    private int $pinCode;

    private bool $started = false;

    public function __construct(string $name, int $pinCode, int $fuelGaugeAmount)
    {
        $this->name = $name;
        $this->pinCode = $pinCode;
        $this->fuelGauge = new FuelGauge($fuelGaugeAmount);
        $this->odometer = new Odometer();
        $this->battery = new Battery();
        $this->tires = [
            new Tire('Front left'),
            new Tire('Front right'),
            new Tire('Back left'),
            new Tire('Back right')
        ];
        $this->lights = [
            new Lights('Close left lights'),
            new Lights('Close right lights'),
            new Lights('Far left lights'),
            new Lights('Far right lights')
        ];
    }

    public function hasStarted(): bool
    {
        return $this->started;
    }

    public function start(int $pinCode): void
    {
        if($this->pinCode === $pinCode) {
            $this->started = true;
        }

    }

    public function drive(int $distance = 10): void
    {
        if ($this->fuelGauge->getFuel() <= 0) return;

        $this->fuelGauge->change($distance * -self::CONSUMPTION_PER_KM);
        $this->odometer->addMileage($distance);
        $this->battery->changeBatteryCondition($distance);

        [$minQualityLoss, $maxQualityLoss] = self::TIRE_QUALITY_LOSS_PER_KM;
        foreach ($this->tires as $tire) {
            $tire->changeCondition(rand($minQualityLoss * $distance, $maxQualityLoss * $distance));
        }

        [$minLightsQualityLoss, $maxLightsQualityLoss] = self::LIGHTS_QUALITY_LOSS_PER_KM;
        foreach ($this->lights as $light) {
            $light->changeLightCondition(rand($minLightsQualityLoss, $maxLightsQualityLoss));
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFuel(): float
    {
        return $this->fuelGauge->getFuel();
    }

    public function getMileage(): int
    {
        return $this->odometer->getMileage();
    }

    public function hasValidTires(): bool
    {
        $brokenTires = [];
        foreach ($this->tires as $tire) {
            if($tire->getCondition() <= 0) {
                $brokenTires[] = $tire;
            }
        }
        return count($brokenTires) < 2;
    }

    public function hasValidLights(): bool
    {
        foreach ($this->lights as $light) {
            if($light->getLightCondition() <= 50) {
                return false;
            }
        }
        return true;
    }

    public function getTires(): array
    {
        return $this->tires;
    }

    public function getLights(): array
    {
        return $this->lights;
    }

    public function getBattery(): float
    {
        return $this->battery->getBatteryCondition();
    }
}