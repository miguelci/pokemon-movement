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
        $current_x = $position->getX();
        $position->setX(++$current_x);
        return $position;
    }
}
