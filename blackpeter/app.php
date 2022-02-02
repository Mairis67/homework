<?php

require_once 'Card.php';
require_once 'Deck.php';
require_once 'BlackPeter.php';
require_once 'Player.php';

$game = new BlackPeter();
$player = new Player();
$npc = new Player();

for ($i = 0; $i < 25; $i++) {
    $player->addCard($game->deal());
}

for ($i = 0; $i < 24; $i++) {
    $npc->addCard($game->deal());
}

echo 'Player Cards: ' . PHP_EOL;
foreach ($player->getCards() as $card) {
    echo '| ' . $card->getDisplayValue() . ' |';
}
echo PHP_EOL;
$player->disband();

foreach ($player->getCards() as $card) {
    echo '| ' . $card->getDisplayValue() . ' |';
}
echo PHP_EOL;

echo '<><><><><><><><><><>' . PHP_EOL;

echo 'NPC Cards:' . PHP_EOL;
foreach ($npc->getCards() as $card) {
    echo '| ' . $card->getDisplayValue() . ' |';
}
echo PHP_EOL;
$npc->disband();

foreach ($npc->getCards() as $card) {
    echo '| ' . $card->getDisplayValue() . ' |';
}
echo PHP_EOL;

while (true) {

    $player->playerChoseCard($player, $npc);

    echo 'Player Cards: ' . PHP_EOL;
    foreach ($player->getCards() as $card) {
        echo '| ' . $card->getDisplayValue() . ' |';
    }
    echo PHP_EOL;

    echo 'NPC Cards:' . PHP_EOL;
    foreach ($npc->getCards() as $card) {
        echo '| ' . $card->getDisplayValue() . ' |';
    }
    echo PHP_EOL;

    echo '<><><><><><><><><><>' . PHP_EOL;

    if ($game->checkWinner($player)) {
        echo "Player Won!" . PHP_EOL;
        exit;
    }

    if ($game->checkWinner($npc)) {
        echo "Npc Won!" . PHP_EOL;
        exit;
    }

    echo '<><><><><><><><><><>' . PHP_EOL;

    $npc->npcChoseCard($npc, $player);

    echo 'Player Cards: ' . PHP_EOL;
    foreach ($player->getCards() as $card) {
        echo '| ' . $card->getDisplayValue() . ' |';
    }
    echo PHP_EOL;

    echo 'NPC Cards:' . PHP_EOL;
    foreach ($npc->getCards() as $card) {
        echo '| ' . $card->getDisplayValue() . ' |';
    }
    echo PHP_EOL;

    echo '<><><><><><><><><><>' . PHP_EOL;

    if ($game->checkWinner($player)) {
        echo "Player Won!" . PHP_EOL;
        exit;
    }

    if ($game->checkWinner($npc)) {
        echo "Npc Won!" . PHP_EOL;
        exit;
    }

    sleep(1);
}