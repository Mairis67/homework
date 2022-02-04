<?php

class Account
{
    private string $name;
    private int $balance;

    private int $transfer = 0;
    private int $sum = 0;

    public function __construct(string $name, int $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function deposit(int $amount): int
    {
        return $this->balance += $amount;
    }


    public function transferMoney(Account $firstAccount, Account $secondAccount): void
    {
        $option = (float) readline('Please choose how much money you want to transfer: ');

        $firstAccount->balance = $this->balance - $option;

        $this->transfer = $option;

        $secondAccount->balance += $this->transfer;
    }
}

$daveAccount = new Account("Dave's account", 100);
$mattAccount = new Account("Matt's account", 0);
$myAccount = new Account("My account", 0);

echo "Initial state" . PHP_EOL;
echo PHP_EOL;
echo $daveAccount->getName() . ' has ' . number_format($daveAccount->getBalance(), 1) . '$' . PHP_EOL;
echo $mattAccount->getName() . ' has ' . number_format($mattAccount->getBalance(), 1) . '$' . PHP_EOL;
echo $myAccount->getName() . ' has ' . number_format($myAccount->getBalance(), 1) . '$' . PHP_EOL;
echo '<><><><><><><><><><><><><><>' . PHP_EOL;

echo "After deposit" . PHP_EOL;
echo PHP_EOL;
$daveAccount->deposit(20);

echo $daveAccount->getName() . ' has ' . number_format($daveAccount->getBalance(), 1) . '$' . PHP_EOL;
echo $mattAccount->getName() . ' has ' . number_format($mattAccount->getBalance(), 1) . '$' . PHP_EOL;
echo $myAccount->getName() . ' has ' . number_format($myAccount->getBalance(), 1) . '$' . PHP_EOL;
echo '<><><><><><><><><><><><><><>' . PHP_EOL;

$daveAccount->transferMoney($daveAccount, $mattAccount);
$mattAccount->transferMoney($mattAccount, $myAccount);

echo 'After transfer' . PHP_EOL;
echo $daveAccount->getName() . ' has ' . number_format($daveAccount->getBalance(), 1) . '$' . PHP_EOL;
echo $mattAccount->getName() . ' has ' . number_format($mattAccount->getBalance(), 1) . '$' . PHP_EOL;
echo $myAccount->getName() . ' has ' . number_format($myAccount->getBalance(), 1) . '$' . PHP_EOL;





