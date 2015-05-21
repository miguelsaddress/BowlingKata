<?php
use Bowling\Test;
use Bowling\Game\StrikeRoll;
use Bowling\Game\MissRoll;
use Bowling\Game\NumericRoll;


class StrikeRollTest extends Test
{

	//TODO: tratar excepciones
	private function getEmpyBonusStrikeRoll() {
		return new StrikeRoll(new MissRoll(), new MissRoll());
	}

	private function getSuperStrikeRoll() {
		$emptyBonusStrike = $this->getEmpyBonusStrikeRoll();
		return new StrikeRoll(clone $emptyBonusStrike, clone $emptyBonusStrike);
	}

	public function testScore() {
		$emptyBonusStrike = $this->getEmpyBonusStrikeRoll();
		$this->assertEquals($emptyBonusStrike->getScore(), 10);
	}

	public function testBonus() {
		$emptyBonusStrike = $this->getEmpyBonusStrikeRoll();
		$this->assertEquals($emptyBonusStrike->getBonus(), 0);

		$roll = $this->getSuperStrikeRoll();
		$this->assertEquals($roll->getBonus(), 20); //la tirada son 30, el bonus 20

		$roll = new StrikeRoll(new NumericRoll(5), new NumericRoll(2));
		$this->assertEquals($roll->getBonus(), 7);

		$roll = new StrikeRoll(new NumericRoll(8), new MissRoll());
		$this->assertEquals($roll->getBonus(), 8);
	}

	public function testCost() {
		$emptyBonusStrike = $this->getEmpyBonusStrikeRoll();
		$this->assertEquals($emptyBonusStrike->getCost(), 2);
	}


}