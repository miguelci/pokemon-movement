<?php

namespace Pokemons\provider;


class PositionBasket
{

    private $positions;
    private $currentPosition;

    /**
     * PositionBasket constructor.
     *
     * @param array $positions
     */
    public function __construct(array $positions = [])
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
    public function addPosition(Position $position): bool
    {
        $hash = $position->getHash();
        $this->setCurrentPosition($position);
        if (! in_array($hash, $this->positions)) {
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
    public function getCurrentPosition(): Position
    {
        if (empty($this->positions)) {
            return new Position(0, 0);
        }

        return $this->currentPosition;
    }

    /**
     * Sets the current position.
     *
     * @param Position $currentPosition
     */
    public function setCurrentPosition(Position $currentPosition)
    {
        $this->currentPosition = $currentPosition;
    }

}
