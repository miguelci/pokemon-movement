<?php

namespace Pokemons\Factory;


use Pokemons\Event\EastMovement;
use Pokemons\Event\NorthMovement;
use Pokemons\Event\SouthMovement;
use Pokemons\Event\WestMovement;

class MovementFactory
{

    static function create($type = 'start')
    {
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
