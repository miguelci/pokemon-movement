<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Pokemons\controller\BoardController;
use Pokemons\Event\EastMovement;
use Pokemons\Event\NorthMovement;
use Pokemons\Event\SouthMovement;
use Pokemons\Event\WestMovement;
use Pokemons\Factory\MovementFactory;
use Pokemons\provider\Position;

class MovementTest extends TestCase
{

    public function testBoardController()
    {
        $board  = new BoardController();
        $amount = $board->getPokemonBasketAmount();
        $this->assertEquals(0, $amount);

        return $board;
    }

    /**
     * @depends testBoardController
     */
    public function testStartingPosition(BoardController $boardController)
    {
        $position = new Position(0, 0);
        $this->assertEquals(0, $position->getX());
        $this->assertEquals(0, $position->getY());

        $boardController->setStartingPosition($position);
        $this->assertEquals(1, $boardController->getPokemonBasketAmount());

        return $boardController;
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

    /**
     * @depends testBoardController
     */
    public function testOneMovement(BoardController $boardController)
    {
        $movement = MovementFactory::create('N');
        $boardController->addMovementToPosition($movement);
        $this->assertEquals(2, $boardController->getPokemonBasketAmount());
    }

    /**
     * @depends testBoardController
     */
    public function testMovementAndBackToSamePlace(BoardController $boardController)
    {
        $currentAmount = $boardController->getPokemonBasketAmount();
        $coordinates   = ['N', 'E', 'S', 'O']; // should only catch 3 pokemons because will return to the same position

        foreach ($coordinates as $coordinate) {
            $boardController->addMovementToPosition(MovementFactory::create($coordinate));
        }
        $this->assertEquals($currentAmount + 3, $boardController->getPokemonBasketAmount());
    }


    /**
     * @depends testBoardController
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidMovement(BoardController $boardController)
    {
        $boardController->addMovementToPosition(MovementFactory::create('A'));
    }

}