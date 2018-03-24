<?php
/**
 * Created by PhpStorm.
 * User: miguelh
 * Date: 20/07/2017
 * Time: 21:33
 */

require_once __DIR__ . '/vendor/autoload.php';

// get the arguments from the input of the user.
$coordinates = str_split($argv[1]);

$board = new \Pokemons\controller\BoardController();

$board->setStartingPosition(new \Pokemons\provider\Position(0,0));

foreach($coordinates as $coordinate) {
    $board->addMovementToPosition(\Pokemons\Factory\MovementFactory::create($coordinate));
}

echo "Fetched " . $board->getPokemonBasketAmount()  . " pokemons." . PHP_EOL;
