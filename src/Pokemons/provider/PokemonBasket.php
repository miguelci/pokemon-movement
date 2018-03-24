<?php
/**
 * Created by PhpStorm.
 * User: miguelh
 * Date: 20/07/2017
 * Time: 22:07
 */

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
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Returns the current amount of pokemons.
     *
     * @return int
     */
    public function getAmount()
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
