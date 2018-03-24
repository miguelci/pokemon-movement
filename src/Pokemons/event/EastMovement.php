<?php


namespace Pokemons\Event;


use Pokemons\provider\Position;

class EastMovement implements Movement
{

    /**
     * @param Position $position
     *
     * @return Position
     */
    public function execute(Position $position)
    {
        $current_x = $position->getX();
        $position->setX(++$current_x);
        return $position;
    }
}
