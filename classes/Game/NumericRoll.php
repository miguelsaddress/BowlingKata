<?php
namespace Bowling\Game;
use Bowling\Game\Roll;

class NumericRoll extends Roll {

    public function __construct($value) {
        $this->value = $value;
    }

    public function getBonus() {
        return 0; 
    }
}

