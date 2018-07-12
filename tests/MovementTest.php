<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Pokemons\Controller\BoardController;
use Pokemons\Event\EastMovement;
use Pokemons\Event\NorthMovement;
use Pokemons\Event\SouthMovement;
use Pokemons\Event\WestMovement;
use Pokemons\Factory\MovementFactory;
use Pokemons\provider\Position;

class MovementTest extends TestCase
{
    private $boardController;

    public function setUp()
    {
        parent::setUp();
        $this->boardController = new BoardController();
    }

    public function testBoardController()
    {
        $amount = $this->boardController->getPokemonBasketAmount();
        $this->assertEquals(0, $amount);
    }

    public function testStartingPosition()
    {
        $position = new Position(0, 0);
        $this->assertEquals(0, $position->getX());
        $this->assertEquals(0, $position->getY());

        $this->boardController->setStartingPosition($position);
        $this->assertEquals(1, $this->boardController->getPokemonBasketAmount());
    }

    public function testMovementFactory()
    {
        $movement = MovementFactory::create('N');
        self::assertInstanceOf(NorthMovement::class, $movement);

        $movement = MovementFactory::create('S');
        self::assertInstanceOf(SouthMovement::class, $movement);

        $movement = MovementFactory::create('W');
        self::assertInstanceOf(WestMovement::class, $movement);

        $movement = MovementFactory::create('E');
        self::assertInstanceOf(EastMovement::class, $movement);
    }

    public function testOneMovement()
    {
        $movement = MovementFactory::create('N');
        $this->boardController->addMovementToPosition($movement);
        $this->assertEquals(1, $this->boardController->getPokemonBasketAmount());
    }

    public function testMovementAndBackToSamePlace()
    {
        $coordinates   = ['N', 'E', 'S', 'O']; // should only catch 3 pokemons because will return to the same position

        foreach ($coordinates as $coordinate) {
            $this->boardController->addMovementToPosition(MovementFactory::create($coordinate));
        }
        $this->assertEquals(4, $this->boardController->getPokemonBasketAmount());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCreateInvalidMovement()
    {
        MovementFactory::create('A');
    }

}