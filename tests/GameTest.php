<?php
use Bowling\Game;
use Bowling\Test;

class GameTest extends Test
{

    static private $messages = array();

	private $frames = array(
		'XXXXXXXXXXXX' 			=> 300,
		'9-9-9-9-9-9-9-9-9-9-' 	=> 90,
		'5/5/5/5/5/5/5/5/5/5/5' =>150,
		'9-4345--X335/31-341' 	=> 72,
		'4581223633722-5-5/23' 	=> 70,
	);

	public function testFrames() {
		foreach ($this->frames as $frameString => $expected) {
			$game = new Game($frameString);
			$c = $game->getScore();
			self::$messages[] = "TOTAL [$expected]: $c";
			$this->assertEquals($c, $expected);
		}
	}

	static public function tearDownAfterClass() {
	    echo PHP_EOL, implode(PHP_EOL, self::$messages);
	}

}