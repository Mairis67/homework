<?php

class Movie
{
    public string $title;
    public string $studio;
    public string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }
}

class GetPG
{
    protected array $movieList = [];
    protected array $pgMovies = [];

    public function showMovies(Movie $movie): void
    {
        $this->movieList[] = $movie;
    }

    public function showPg(): array
    {
        foreach ($this->movieList as $movie) {
            if($movie->rating === 'PG') {
                $this->pgMovies[] = $movie;
            }
        }
        return $this->pgMovies;
    }
}

$casino_royale = new Movie('Casino Royale', 'Eon Productions', 'PG13');
$glass = new Movie('Glass', 'Buena Vista International', 'PG13');
$spider_man = new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG');

$movieList = new GetPG();
$movieList->showMovies($casino_royale);
$movieList->showMovies($glass);
$movieList->showMovies($spider_man);

var_dump($movieList->showPg());



