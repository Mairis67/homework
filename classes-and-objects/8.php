<?php

class SavingsAccount
{
    private int $startingBalance;

    private const MONTHS_IN_YEAR = 12;

    public function __construct(float $startingBalance)
    {
        $this->startingBalance = $startingBalance;
    }

    public function getStartingBalance(): float
    {
        return $this->startingBalance;
    }

    public function withdrawal(float $bank, float $amount): float
    {
        return $bank -= $amount;
    }

    public function deposit(float $bank, float $amount): float
    {
        return $bank += $amount;
    }

    public function addingMonthlyInterests(float $bank, float $interestRate): float
    {
        $a = $bank * $interestRate;
        return $a / self::MONTHS_IN_YEAR;
    }

}

$moneyInAccount = (int)readline('How much money is in the account?: ');

$money = new SavingsAccount($moneyInAccount);

$interestRate = (int)readline('Enter annual interest rate: ');

$accountOpened = (int)readline('How long has the account been opened?: ');

$count = 0;
$deposit = 0;
$withdrawn = 0;
$subInterest = 0;
$interest = 0;
$finalSubInterest = 0;
$bank = 0;

while ($accountOpened > $count + ($accountOpened - 1)) {

    $bank = $money->getStartingBalance();

    $depositMonthOne = (int)readline('Enter amount deposited for month: 1 : ');
    $account = $money->deposit($bank, $depositMonthOne);
    $bank = $account;
    $deposit += $depositMonthOne;
    $withdrawnMonthOne = (int)readline('Enter amount withdrawn for 1: ');
    $account = $money->withdrawal($bank, $withdrawnMonthOne);
    $bank = $account;
    $withdrawn += $withdrawnMonthOne;
    $subInterest = $money->addingMonthlyInterests($bank, $interestRate);
    $finalSubInterest += $subInterest;
    $interest = $subInterest + $bank;
    $bank = $interest;

    $depositMonthTwo = (int)readline('Enter amount deposited for month: 2 : ');
    $account = $money->deposit($bank, $depositMonthTwo);
    $bank = $account;
    $deposit += $depositMonthTwo;
    $withdrawnMonthTwo = (int)readline('Enter amount withdrawn for 2: ');
    $account = $money->withdrawal($bank, $withdrawnMonthTwo);
    $bank = $account;
    $withdrawn += $withdrawnMonthTwo;
    $subInterest = $money->addingMonthlyInterests($bank, $interestRate);
    $finalSubInterest += $subInterest;
    $interest = $subInterest + $bank;
    $bank = $interest;

    $depositMonthThree = (int)readline('Enter amount deposited for month: 3 : ');
    $account = $money->deposit($bank, $depositMonthThree);
    $bank = $account;
    $deposit += $depositMonthThree;
    $withdrawnMonthThree = (int)readline('Enter amount withdrawn for 3: ');
    $account = $money->withdrawal($bank, $withdrawnMonthThree);
    $bank = $account;
    $withdrawn += $withdrawnMonthThree;
    $subInterest = $money->addingMonthlyInterests($bank, $interestRate);
    $finalSubInterest += $subInterest;
    $interest = $subInterest + $bank;
    $bank = $interest;

    $depositMonthFour = (int)readline('Enter amount deposited for month: 4 : ');
    $account = $money->deposit($bank, $depositMonthFour);
    $bank = $account;
    $deposit += $depositMonthFour;
    $withdrawnMonthFour = (int)readline('Enter amount withdrawn for 4: ');
    $account = $money->withdrawal($bank, $withdrawnMonthFour);
    $bank = $account;
    $withdrawn += $withdrawnMonthFour;
    $subInterest = $money->addingMonthlyInterests($bank, $interestRate);
    $finalSubInterest += $subInterest;
    $interest = $subInterest + $bank;
    $bank = $interest;

    echo 'Total deposited: $' . number_format($deposit, 2, '.', ',');
    echo PHP_EOL;
    echo 'Total withdrawn: $' . number_format($withdrawn, 2, '.', ',');
    echo PHP_EOL;
    echo 'Interest earned: $' . number_format($finalSubInterest, 2, '.', ',');
    echo PHP_EOL;
    echo 'Ending Balance: $' . number_format($bank,2, '.', ',');
    echo PHP_EOL;

    $count++;
}

