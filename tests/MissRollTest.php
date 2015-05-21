<?php
use Bowling\Test;
use Bowling\Game\MissRoll;

class MissRollTest extends Test
{

	public function testScore() {
		$miss = new MissRoll();
		$this->assertEquals($miss->getScore(), 0);
	}

	public function testBonus() {
		$miss = new MissRoll();
		$this->assertEquals($miss->getBonus(), 0);
	}

	public function testCost() {
		$miss = new MissRoll();
		$this->assertEquals($miss->getCost(), 1);
	}
}