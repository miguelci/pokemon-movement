<?php
/**
 * Created by PhpStorm.
 * User: miguelh
 * Date: 20/07/2017
 * Time: 22:02
 */

namespace Pokemons\provider;


class Position
{

    private $x;
    private $y;

    /**
     * Position constructor.
     *
     * @param int $x The current position on the x axis.
     * @param int $y The current position on the y axis.
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param int $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param int $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }

    /**
     * Returns an index of the position.
     *
     * @return string
     */
    public function getHash()
    {
        return "x" . $this->x . "y" . $this->y;
    }

}
