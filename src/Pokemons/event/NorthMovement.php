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
        $currentY = $position->getY();
        $position->setY(++$currentY);
        return $position;
    }
}
