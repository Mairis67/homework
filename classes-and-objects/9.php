<?php

class BankAccount
{
    private string $userName;
    private string $balance;

    public function __construct(string $userName, string $balance)
    {
        $this->userName = $userName;
        $this->balance = $balance;
    }


    public function getName(): string
    {
        return $this->userName;
    }

    public function getBalance(): string
    {
        return $this->balance;
    }

    public function showUserNameAndBalance(): void
    {
        $num = $this->getBalance();

        if($num < 0) {
            $positiveNum = abs($num);
            $reversed = number_format($positiveNum, 2);
            echo $this->getName() . ', $' . $reversed. PHP_EOL;
        } else {
            echo $this->getName() . ', $' . number_format($num, 2) . PHP_EOL;
        }
    }
}

$benson = new BankAccount('Benson', 17.25);
$ben = new BankAccount('Benson', -17.5);
$benson->showUserNameAndBalance();
$ben->showUserNameAndBalance();
$mairis = new BankAccount('Mairis', -125.2);
$liene = new BankAccount('Liene', 25.2);
$mairis->showUserNameAndBalance();
$liene->showUserNameAndBalance();
