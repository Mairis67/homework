<?php

$person = new stdClass();
$person->name = 'Mairis';
$person->cash = 2050;
$person->license = ['A', 'C'];

function createWeapon(string $name, int $price, string $license = null): stdClass
{
    $weapon = new stdClass();
    $weapon->name = $name;
    $weapon->license = $license;
    $weapon->price = $price;
    return $weapon;
}

$weapons = [
    createWeapon('AK47', 1000, 'C'),
    createWeapon('Deagle', 500, 'A'),
    createWeapon('Knife', 100),
    createWeapon('Glock', 250, 'A')
];

echo "{$person->name} has {$person->cash}$ " . PHP_EOL . PHP_EOL;

$basket = [];

while (true)
{
    echo "{1} Purchase" . PHP_EOL;
    echo "{2} Checkout" . PHP_EOL;
    echo "{Any} Exit" . PHP_EOL;

    $option = (int) readline('Select an option: ');
    switch ($option){
        case 1: // Purchase
            foreach ($weapons as $index => $weapon) {
                echo "[{$index}] {$weapon->name} ({$weapon->license}) {$weapon->price}" .PHP_EOL;
            }

            $selectedWeaponIndex = (int) readline('Select Weapon: ');

            $weapon = $weapons[$selectedWeaponIndex] ?? null;

            if($weapon === null)
            {
                echo 'Weapon not found' . PHP_EOL;
                exit;
            }

            if ($weapon->license !== null && !in_array($weapon->license, $person->license))
            {
                echo 'Invalid license' . PHP_EOL;
                exit;
            }

            $basket[] = $weapon; // <-- array_push

            echo "Added {$weapon->name} to basket" . PHP_EOL;
            break;
        case 2: // Checkout
            $totalSum = 0;

            foreach ($basket as $weapon)
            {
                $totalSum += $weapon->price;
                echo "{$weapon->name}" . PHP_EOL;
            }

            echo "-------------------------" . PHP_EOL;
            echo "Total: $totalSum $" . PHP_EOL;
            echo PHP_EOL;

            echo ($person->cash >= $totalSum)
                ? "Successful payment"
                : "Payment failed. Not enough cash!";
            echo PHP_EOL;

            exit;
        default: // Exit
            exit;
    }
}










