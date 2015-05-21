<?php
namespace Bowling\Game;
use Bowling\Game\Roll;

class SpareRoll extends Roll {

    private $bonus;

    public function __construct($previousValue, Roll $bonus) {
        $this->value = (10 - intval($previousValue));
        $this->bonus = $bonus;
    }

    public function getBonus() {
        return $this->bonus->getScore(); 
    }
}
