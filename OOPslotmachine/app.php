<?php

require_once 'OOPslotmachine/Player.php';
require_once 'OOPslotmachine/Board.php';
require_once 'OOPslotmachine/Combinations.php';
require_once 'OOPslotmachine/SlotMachine.php';

$slotMachine = new Slotmachine();
$playerMoney = $slotMachine->getCash();
$spinCost = $slotMachine->getSpinCost();

while (true) {
    echo 'Player: ' . $slotMachine->getName() . ' has ' . $playerMoney . '$' . PHP_EOL;
    echo '{1} Play' . PHP_EOL;
    echo '{2} Change Spin cost' . PHP_EOL;
    echo '{3} Exit' . PHP_EOL;

    $option = (int)readline('Please choose: ');

    switch ($option) {
        case 1: // Play
            if($spinCost <= $playerMoney) {
                $slotMachine->getBoard();

                $playerMoney -= $spinCost;

                $winner = $slotMachine->checkWinner();

                if(sizeof($winner) > 0) {
                    $playerWon = $slotMachine->winnerCash($winner, $slotMachine->getChanceToWin(),$spinCost);
                    $playerMoney += $playerWon;
                    echo 'You won' . $playerWon . '$' . PHP_EOL;
                } else {
                    echo 'Sorry you lost' . PHP_EOL;
                }
            } else {
                echo 'Not enough money' . PHP_EOL;
            }
            break;

        case 2: // Change Spin Cost
            echo 'You have ' . $playerMoney . '$' . PHP_EOL;

            $changeSpinCost = (int) readline('Change spin cost: ');
            if($changeSpinCost <= $playerMoney) {
                $spinCost = $changeSpinCost;
                echo 'Spin cost changed to ' . $spinCost . PHP_EOL;
            } else {
                echo 'Sorry not enough money' . PHP_EOL;
            }
            break;

        case 3: // Exit
            exit;
    }
}