<?php

namespace Pokemons\Event;


use Pokemons\Provider\Position;

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
    function execute(Position $position): Position
    {
        $currentY = $position->getY();
        $position->setY(--$currentY);

        return $position;
    }
}
