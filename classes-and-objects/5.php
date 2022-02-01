<?php

class Date
{
    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month, int $day, int $year)
    {
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }

    public function getDate(): int
    {
        return $this->day;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function getYear(): int
    {
        return $this->year;
    }
}


class Test
{

    private Date $date;

    public function __construct()
    {
        $this->date = new Date(2, 23, 1990);
    }

    public function dateTest(): void
    {
        echo ('23/2/1990' === "{$this->date->getDate()}/{$this->date->getMonth()}/{$this->date->getYear()}")
            ? 'Correct' : 'Incorrect';
        echo PHP_EOL;
    }
}

$test = new Test();

$test->dateTest();