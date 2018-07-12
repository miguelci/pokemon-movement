<?php


namespace Pokemons\Event;


use Pokemons\Provider\Position;

class EastMovement implements Movement
{

    /**
     * @param Position $position
     *
     * @return Position
     */
    public function execute(Position $position): Position
    {
        $currentX = $position->getX();
        $position->setX(++$currentX);
        return $position;
    }
}
