<?php
use Bowling\Test;
use Bowling\Game\NumericRoll;

class NumericRollTest extends Test
{

	//TODO: tratar excepciones

	public function testScore() {
		$roll = new NumericRoll(8);
		$this->assertEquals($roll->getScore(), 8);
	}

	public function testBonus() {
		$roll = new NumericRoll(8);
		$this->assertEquals($roll->getBonus(), 0);
	}

	public function testCost() {
		$roll = new NumericRoll(8);
		$this->assertEquals($roll->getCost(), 1);
	}


}