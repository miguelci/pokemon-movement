<?php

namespace Pokemons\provider;


class PositionBasket
{

    private $positions;
    private $current_position;

    /**
     * PositionBasket constructor.
     *
     * @param array $positions
     */
    public function __construct(array $positions)
    {
        $this->positions = $positions;
    }

    /**
     * @return array
     */
    public function getPositions()
    {
        return $this->positions;
    }


    /**
     * Tries to add a position to the array if it's not filled yet.
     * Returns true if yes, false if not.
     *
     * @param Position $position
     *
     * @return bool
     */
    public function addPosition(Position $position)
    {
        $hash = $position->getHash();
        $this->setCurrentPosition($position);
        if (!in_array($hash, $this->positions)) {
            $this->positions[] = $hash;
            return true;
        }
        return false;
    }

    /**
     * Returns the current position.
     *
     * @return Position
     */
    public function getCurrentPosition()
    {
        if (empty($this->positions)) {
            return new Position(0, 0);
        }

        return $this->current_position;
    }

    /**
     * Sets the current position.
     *
     * @param Position $current_position
     */
    public function setCurrentPosition($current_position)
    {
        $this->current_position = $current_position;
    }

}
