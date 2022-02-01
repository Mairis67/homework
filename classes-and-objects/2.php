<?php

class Point
{
    public int $x;
    public int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function swapPoints()
    {
        $temp = $this->x;
        $this->x = $this->y;
        $this->y = $temp;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

echo '(' . $p1->x . ', ' . $p1->y . ')' . PHP_EOL;
echo '(' . $p2->x . ', ' . $p2->y . ')' . PHP_EOL;











