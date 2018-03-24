<?php
/**
 * Created by PhpStorm.
 * User: miguelh
 * Date: 20/07/2017
 * Time: 21:39
 */

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
