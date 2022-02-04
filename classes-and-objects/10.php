<?php

class Application
{
    function run()
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->addMovies();
                    break;
                case 2:
                    $this->rentVideo();
                    break;
                case 3:
                    $this->returnVideo();
                    break;
                case 4:
                    $this->listInventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function addMovies(): void
    {
        //todo
    }

    private function rentVideo()
    {
        //todo
    }

    private function returnVideo()
    {
        //todo
    }

    private function listInventory()
    {
        //todo
    }
}

class VideoStore
{
    private array $inventory = ['The Dark Knight', 'Inception'];
    private array $checkedOut = [];

    public function checkoutMovies(): void
    {
        $checkout = readline('Which movie you would like to check out? ');

        foreach ($this->inventory as $movie) {
            if($movie === $checkout) {
                $this->checkedOut[] = $movie;
                unset($this->inventory[$movie]);
            }
        }
    }

    public function getInventory(): array
    {
        return $this->inventory;
    }

    public function getCheckedOutMovies(): array
    {
        return $this->checkedOut;
    }

    public function returnMovie(): void
    {
        $returnMovie = readline('Which movie you want to return? ');

        foreach ($this->checkedOut as $rented) {
            if($returnMovie === $rented) {
                $this->inventory[] = $rented;
                unset($this->checkedOut[$rented]);
            }
        }
    }

}

class Video
{

    private string $title;
    private bool $available;
    private int $rating; // %

    public function __construct(string $tittle, bool $available, float $rating)
    {
        $this->tittle = $tittle;
        $this->available = $available;
        $this->rating = $rating;
    }

    public function getTittle(): string
    {
        return $this->title;

    }

    public function getAvailability(): bool
    {
        return $this->available;
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    public function checkOutMovie($movie): bool
    {
        if($this->getAvailability() === true) {
            $this->available = false;
        }
        return $this->available;
    }

    public function returnMovie($movie): bool
    {
        if($this->getAvailability() === false) {
            $this->available = true;
        }
        return $this->available;
    }

    public function leaveRating($rating): float
    {
        $rating = $this->getRating();
        $this->rating = $rating;
        return $this->rating;
    }
}

$app = new Application();
$app->run();

//$videoStore = new VideoStore();
//var_dump($videoStore->getInventory());
//echo '--------------' . PHP_EOL;
//$videoStore->checkoutMovies();
//var_dump($videoStore->getCheckedOutMovies());
//echo '--------------' . PHP_EOL;
//var_dump($videoStore->getInventory());






