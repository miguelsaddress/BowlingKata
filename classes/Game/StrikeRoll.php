<?php
namespace Bowling\Game;
use Bowling\Game\Roll;

class StrikeRoll extends Roll {

    private $bonus1;
    private $bonus2;

    public function __construct(Roll $next1, Roll $next2) {
        $this->value = 10;
        $this->cost = 2;
        $this->bonus1 = $next1;
        $this->bonus2 = $next2;
    }

    public function getBonus() {
        return $this->bonus1->getScore() + $this->bonus2->getScore(); 
    }
}
