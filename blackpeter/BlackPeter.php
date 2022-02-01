<?php

class BlackPeter
{
    private Deck $deck;

    public function __construct()
    {
        $this->deck = new Deck();
    }

    public function deal(): Card
    {
        return $this->deck->draw();
    }

    public function getDeck(): Deck
    {
        return $this->deck;
    }

    public static function equalCards(Card $firstCard, Card $secondCard): bool
    {
        return $firstCard->getSymbol() === $secondCard->getSymbol();
    }
}












