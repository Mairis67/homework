<?php

class VideoStore
{
    private array $inventory;
    private Video $video;

    public function addVideo($title)
    {
        $this->inventory[] = $this->video = new Video($title);
    }

    public function getInventory(): array
    {
        return $this->inventory;
    }

    public function showInventory(): void
    {
        foreach ($this->getInventory() as $movie) {
            echo '{Title}: ' . $movie->getTitle()
                . ' {Rating}: ' . $movie->getRating() . ' {Availability}: ' . $movie->showAvailability();
            echo PHP_EOL;
        }
    }

    public function rentVideo($title): ?Video
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $title && $this->video->getAvailability()) {
                $video->checkOutVideo();
                return $video;
            }
        }
        echo "Sorry we don't have this movie!" . PHP_EOL;
        return null;
    }

    public function returnVideo($title, int $rating): void
    {
        foreach ($this->inventory as $rented) {
            if ($rented->getTitle() === $title) {
                $rented->checkOutVideo();
                $rented->addRating($rating);
            }
        }
    }
}