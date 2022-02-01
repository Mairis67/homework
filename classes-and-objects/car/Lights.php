<?php

class Lights
{
    private int $condition;
    private string $name;

    public function __construct(string $name, int $condition = 100)
    {
        $this->name = $name;
        $this->condition = $condition;
    }

    public function changeLightCondition(int $percent): void
    {
        $this->condition -= $percent;
    }

    public function getLightCondition(): int
    {
        return $this->condition;
    }

    public function getLightName(): string
    {
        return $this->name;
    }
}