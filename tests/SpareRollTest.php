<?php
use Bowling\Test;
use Bowling\Game\SpareRoll;
use Bowling\Game\MissRoll;
use Bowling\Game\NumericRoll;


class SpareRollTest extends Test
{

	//TODO: tratar excepciones
	
	public function testScore() {
		$roll = new SpareRoll(8, new MissRoll());
		$this->assertEquals($roll->getScore(), 2);
	}

	public function testBonus() {
		$roll = new SpareRoll(8, new NumericRoll(6));
		$this->assertEquals($roll->getBonus(), 6);

		$roll = new SpareRoll(8, new SpareRoll(3, new NumericRoll(6)));
		$this->assertEquals($roll->getBonus(), 7);
	}

	public function testCost() {
		$roll = new SpareRoll(8, new MissRoll());
		$this->assertEquals($roll->getCost(), 1);
	}


}