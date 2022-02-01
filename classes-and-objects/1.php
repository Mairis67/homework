<?php

class Product
{
    public float $startPrice;
    public int $amount;
    public string $name;

    public function __construct(string $name, float $startPrice, int $amount)
    {
        $this->name = $name;
        $this->startPrice = $startPrice;
        $this->amount = $amount;
    }

    public function printProduct(): string
    {
        return $this->name . ' price ' . $this->startPrice . ' amount ' . $this->amount;
    }

    public function chanePrice($newPrice)
    {
        return $this->startPrice = $newPrice;
    }

    public function changeQuantity($newAmount)
    {
        return$this->amount = $newAmount;
    }
}

$logitech = new Product('Logitech mouse', 70.00, 14);
$phone = new Product('iPhone', 999.99, 3);
$epson = new Product('Epson EB-U05', 440.46, 1);

$phone->chanePrice(00.95);
$phone->changeQuantity(1);

echo $logitech->printProduct() . PHP_EOL;
echo $phone->printProduct() . PHP_EOL;
echo $epson->printProduct() . PHP_EOL;