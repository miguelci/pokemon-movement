<?php
/**
 * Created by PhpStorm.
 * User: miguelh
 * Date: 20/07/2017
 * Time: 21:40
 */

namespace Pokemons\Event;


use Pokemons\provider\Position;

class SouthMovement implements Movement
{
    /**
     *
     * Executes the movement to the correct position.
     *
     * @param Position $position The current position.
     *
     * @return Position
     */
    function execute(Position $position)
    {
        $current_y = $position->getY();
        $position->setY(--$current_y);

        return $position;
    }
}
