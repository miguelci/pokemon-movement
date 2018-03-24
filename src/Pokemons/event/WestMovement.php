<?php
/**
 * Created by PhpStorm.
 * User: miguelh
 * Date: 20/07/2017
 * Time: 21:41
 */

namespace Pokemons\Event;


use Pokemons\provider\Position;

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
    function execute(Position $position)
    {
        $current_x = $position->getX();
        $position->setX(--$current_x);

        return $position;
    }

}