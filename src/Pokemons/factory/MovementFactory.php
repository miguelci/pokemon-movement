<?php

namespace Pokemons\Factory;


use Pokemons\Event\EastMovement;
use Pokemons\Event\Movement;
use Pokemons\Event\NorthMovement;
use Pokemons\Event\SouthMovement;
use Pokemons\Event\WestMovement;

class MovementFactory
{

    static function create($type): Movement
    {
        $types = ['N', 'S', 'O', 'W', 'E'];

        if (! in_array($type, $types)) {
            throw new \InvalidArgumentException(sprintf('Movement %s not allowed', $type));
        }

        switch ($type) {
            case "N":
                return new NorthMovement();
            case "S":
                return new SouthMovement();
            case "E":
                return new EastMovement();
            case "W":
            case "O":
                return new WestMovement();
        }
    }

}
