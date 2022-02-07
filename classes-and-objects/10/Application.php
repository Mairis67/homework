<?php

require_once 'classes-and-objects/10/Video.php';
require_once 'classes-and-objects/10/VideoStore.php';

class Application
{
    private VideoStore $videoStore;

    function run()
    {
        $this->videoStore = new VideoStore();

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
                    echo "Bye!" . PHP_EOL;
                    die;
                case 1:
                    $title = readline('Please enter video title: ');

                    $this->addMovies($title);
                    break;
                case 2:

                    $this->listInventory();

                    $title = readline('Please enter title: ');

                    $this->rentVideo($title);
                    break;
                case 3:

                    $title = readline('Please enter title: ');
                    $rating = (int) readline('Please enter rating: ');

                    $this->returnVideo($title, $rating);
                    break;

                case 4:
                    $this->listInventory();
                    break;
                default:
                    echo "Sorry, I don't understand you.." . PHP_EOL;
            }
        }
    }

    private function addMovies($title): void
    {
        $this->videoStore->addVideo($title);
    }

    private function rentVideo($title)
    {
        $this->videoStore->rentVideo($title);
    }

    private function returnVideo($title, $rating)
    {
        $this->videoStore->returnVideo($title, $rating);
    }

    private function listInventory()
    {
        $this->videoStore->showInventory();
    }
}

$app = new Application();
$app->run();

$videoStore = new VideoStore();
