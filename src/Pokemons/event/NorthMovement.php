<?php

namespace Pokemons\Event;


use Pokemons\Provider\Position;

class NorthMovement implements Movement
{
    /**
     * @param Position $position
     *
     * @return Position
     */
    public function execute(Position $position): Position
    {
        $current_y = $position->getY();
        $position->setY(++$current_y);
        return $position;
    }
}
