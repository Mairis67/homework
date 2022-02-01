<?php

class SlotMachine
{
    private Player $player;
    private Board $board;
    private Combinations $combinations;

    private int $spinCost = 1;

    private array $combinationBoard = [];
    private array $winnerOptions = [];
    public array $chanceToWin = [
        'A' => 5,
        'B' => 10,
        'C' => 15,
    ];

    public function __construct()
    {
        $this->player = new Player('Mairis', 20);
        $this->board = new Board(3);
        $this->combinations = new Combinations();
    }

    public function getName(): string
    {
        return $this->player->getName();
    }

    public function getCash(): int
    {
        return $this->player->getCash();
    }

    public function getBoard()
    {
        $this->board->displayBoard();
    }

    public function checkWinner(): array
    {
        foreach ($this->combinations->getCombinations() as $key => $combination)
        {
            foreach ($combination as $index => $item)
            {
                [$row, $column] = $item;
                $this->combinationBoard[$key][$index] = $this->board->setBoard()[$row][$column];
            }
        }

        foreach ($this->combinationBoard as $combination)
        {
            if(count(array_unique($combination)) === 1)
            {
                $this->winnerOptions[] = $combination[0];
            }
        }
        return $this->winnerOptions;
    }

    public function winnerCash(array $winningLines, array $chanceToWin, int $spinCost): int
    {
        $wonAmount = 0;
        foreach ($winningLines as $item) {
            switch ($item) {
                case 'A':
                    $wonAmount += $chanceToWin['A'] * $spinCost;
                    break;
                case 'B':
                    $wonAmount += $chanceToWin['B'] * $spinCost;
                    break;
                case 'C':
                    $wonAmount += $chanceToWin['C'] * $spinCost;
                    break;
                default:
                    break;
            }
        }
        return $wonAmount;
    }

    public function getSpinCost(): int
    {
        return $this->spinCost;
    }

    public function getChanceToWin():array
    {
        return $this->chanceToWin;
    }
}