<?php

namespace Pokemons\provider;


class PokemonBasket
{
    /**
     * The amount of pokemons currently in the basket.
     * @var int
     */
    private $amount;

    /**
     * PokemonBasketController constructor.
     *
     * @param int $amount
     */
    public function __construct($amount = 0)
    {
        $this->amount = $amount;
    }

    /**
     * Returns the current amount of pokemons
     *
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * Sets the amount of pokemons
     *
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}
