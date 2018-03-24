<?php
/**
 * Created by PhpStorm.
 * User: miguelh
 * Date: 20/07/2017
 * Time: 21:41
 */

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
