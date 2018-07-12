<?php
declare(strict_types=1);

namespace Pokemons\Controller;

use Pokemons\Event\Movement;
use Pokemons\provider\Position;
use Pokemons\provider\PositionBasket;
use Pokemons\provider\PokemonBasket;

class BoardController
{

    private $positions;
    private $pokemonBasket;

    /**
     * BoardController constructor.
     */
    public function __construct()
    {
        $this->positions     = new PositionBasket();
        $this->pokemonBasket = new PokemonBasket();
    }

    public function setStartingPosition(Position $position): void
    {
        $this->positions->addPosition($position);

        $amount = $this->pokemonBasket->getAmount();
        $this->pokemonBasket->setAmount(++$amount);
    }

    /**
     * Adds a movement to the current position.
     * If the position has not already been visited, it will add one pokemon
     * to the basket, if not, just saves the new position.
     *
     * @param Movement $movement
     */
    public function addMovementToPosition(Movement $movement): void
    {
        $newPosition = $movement->execute($this->positions->getCurrentPosition());

        $amount = $this->pokemonBasket->getAmount();
        if ($this->positions->addPosition($newPosition)) {
            $this->pokemonBasket->setAmount(++$amount);
        }
    }

    /**
     * Returns the amount of pokemons in the basket.
     *
     * @return int
     */
    public function getPokemonBasketAmount(): int
    {
        return $this->pokemonBasket->getAmount();
    }

}
