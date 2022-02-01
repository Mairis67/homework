<?php

class Combinations
{
//    private array $combinations;

//    public function getFile(): string
//    {
//        return file_get_contents('OOPslotmachine/combinations.csv');
//    }

    public function getCombinations(): array
    {
//        foreach (explode(';', $this->getFile()) as $combinationNumber => $combination) {
//            foreach (explode(':', $combination) as $coordsIndex => $coords) {
//                [$x, $y] = explode(',', $coords);
//                $this->combinations[$combinationNumber][$coordsIndex] = [(int)$x, (int)$y];
//            }
//        }
//        return $this->combinations;
        return     [
            [
                [0, 0], [0, 1], [0, 2]
            ],
            [
                [1, 0], [1, 1], [1, 2]
            ],
            [
                [2, 0], [2, 1], [2, 2]
            ],
            [
                [2, 0], [1, 1], [0, 2]
            ],
            [
                [0, 0], [1, 1], [2, 2]
            ],

        ];
    }
}