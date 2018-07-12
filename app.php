<?php

require_once __DIR__ . '/vendor/autoload.php';


if(empty($argv[1])){
    exit('You must insert some coordinates (NSWE)' . PHP_EOL);
}

// get the arguments from the input of the user.
$coordinates = str_split($argv[1]);

$board = new \Pokemons\Controller\BoardController();

$board->setStartingPosition(new \Pokemons\provider\Position(0,0));

foreach($coordinates as $coordinate) {
    $board->addMovementToPosition(\Pokemons\Factory\MovementFactory::create($coordinate));
}

echo "Fetched " . $board->getPokemonBasketAmount()  . " pokemons." . PHP_EOL;
