<?php
namespace Bowling;
use Bowling\Game\StringParser;

class Game {

    const BONUSABLE_ROLLS = 20;

    private $rollsCount;
    private $rolls;
    private $score;

    public function __construct($gameString) {
        $this->rollsCount = 0;
        $this->score = 0;
        $this->rolls = (new StringParser($gameString))->asRollsArray(); 
    }

    private function applyBonus($roll) {
        if ($this->rollsCount < self::BONUSABLE_ROLLS) {
            $bonus = $roll->getBonus();
            $this->score += $bonus;
        }
    }

    public function getScore() {
        $len = count($this->rolls);
        for ($i=0; $i < $len; $i++) {
            $roll = $this->rolls[$i];
            $this->score += $roll->getScore();
            $this->rollsCount += $roll->getCost();
            // $this->printStatus();
            $this->applyBonus($roll);
        }
        return $this->score;
    }

    public function printStatus() {
        echo "Rolls Count: ", $this->rollsCount, " - ", "Score: ", $this->score, PHP_EOL;
    }
}
