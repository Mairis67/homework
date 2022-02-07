<?php

class Video
{
    private string $title;
    private bool $available;
    private array $rating;

    public function __construct(string $title = '', array $rating = [], bool $available = true)
    {
        $this->title = $title;
        $this->available = $available;
        $this->rating = $rating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAvailability(): bool
    {
        return $this->available;
    }

    public function showAvailability(): string
    {
        if($this->getAvailability() === true) {
            $availability =  'Available';
        } else {
            $availability =  'Unavailable';
        }
        return $availability;
    }

    public function checkOutVideo(): void
    {
       $this->available = !$this->getAvailability();
    }

    public function addRating(int $rating): void
    {
        $this->rating[] = $rating;
    }

    public function getRating(): int
    {
        if(!empty($this->rating)) {
            $sum = array_sum($this->rating) / count($this->rating);
            return round($sum);
        }
        return 0;
    }

}