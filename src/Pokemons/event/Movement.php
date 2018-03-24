<?php


namespace Pokemons\Event;


use Pokemons\provider\Position;

interface Movement
{
    /**
     *
     * Executes the movement to the correct position.
     *
     * @param Position $position The current position.
     *
     * @return Position
     */
    function execute(Position $position);

}
