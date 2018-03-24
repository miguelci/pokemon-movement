<?php
/**
 * Created by PhpStorm.
 * User: miguelh
 * Date: 20/07/2017
 * Time: 21:34
 */

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
            case "O":
                return new WestMovement();
        }
    }

}
