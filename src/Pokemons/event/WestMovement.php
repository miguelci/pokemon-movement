<?php


namespace Pokemons\Event;


use Pokemons\Provider\Position;

class WestMovement implements Movement
{

    /**
     *
     * Executes the movement to the correct position.
     *
     * @param Position $position The current position.
     *
     * @return Position
     */
    function execute(Position $position): Position
    {
        $current_x = $position->getX();
        $position->setX(--$current_x);

        return $position;
    }

}
