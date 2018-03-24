<?php

namespace Pokemons\Event;


use Pokemons\provider\Position;

class NorthMovement implements Movement
{
    /**
     * @param Position $position
     *
     * @return Position
     */
    public function execute(Position $position)
    {
        $current_y = $position->getY();
        $position->setY(++$current_y);
        return $position;
    }
}
