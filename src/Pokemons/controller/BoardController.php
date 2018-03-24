<?php

namespace Pokemons\controller;


use Pokemons\event\Movement;
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
        $this->positions     = new PositionBasket([]);
        $this->pokemonBasket = new PokemonBasket(0);
    }

    public function setStartingPosition(Position $position)
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
    public function addMovementToPosition(Movement $movement)
    {
        $new_position = $movement->execute($this->positions->getCurrentPosition());

        $amount = $this->pokemonBasket->getAmount();
        if ($this->positions->addPosition($new_position)) {
            $this->pokemonBasket->setAmount(++$amount);
        }
    }

    /**
     * Returns the amount of pokemons in the basket.
     *
     * @return int
     */
    public function getPokemonBasketAmount()
    {
        return $this->pokemonBasket->getAmount();
    }

}
