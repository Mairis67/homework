<?php

class Battery
{
    private int $condition = 0;

    public function changeBatteryCondition(int $percent): void
    {
        if($this->condition < 100) {
            $this->condition += $percent;
        }
    }

    public function getBatteryCondition(): float
    {
        return $this->condition;
    }
}