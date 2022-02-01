<?php

class Player
{

    private string $name;
    private int $cash;

    public function __construct(string $name, int $cash)
    {
        $this->name = $name;
        $this->cash = $cash;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCash(): int
    {
        return $this->cash;
    }
}