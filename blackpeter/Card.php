<?php

class Card
{
    private string $suit;
    private string $symbol;
//    private string $color;

    public function __construct(string $suit, string $symbol)
    {
        $this->suit = $suit;
        $this->symbol = $symbol;
//        $this->color = $color;
    }

    public function getSuit(): string
    {
        return $this->suit;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

//    public function getColor(): string
//    {
//        return $this->color;
//    }

    public function getDisplayValue(): string
    {
        return "{$this->symbol}.{$this->suit}";
    }
}