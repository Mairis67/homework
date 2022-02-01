<?php

class Board
{
    private int $rows = 3;
    private int $columns;
    private array $options = ['A', 'B', 'C'];
    private array $combs;

    public function __construct($columns)
    {
        $this->columns = $columns;
    }

    public function board(): array
    {
        return array_fill(0, $this->rows, array_fill(0, $this->columns, '-'));
    }

    public function displayBoard(): void
    {
        foreach ($this->setBoard() as $field) {
            foreach ($field as $item) {
                echo " $item ";
            }
            echo PHP_EOL;
        }
    }

    public function setBoard(): array
    {
        foreach ($this->board() as $rowIndex => $item) {
            foreach ($item as $columnIndex => $value) {
                $this->combs[$rowIndex][$columnIndex] = $this->options[array_rand($this->options)];
            }
        }
        return $this->combs;
    }
}