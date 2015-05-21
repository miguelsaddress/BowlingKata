<?php
namespace Bowling\Game;

abstract class Roll {

    protected $value = 0;
    protected $cost = 1;

    public function getCost() {
        return $this->cost;
    }

    public function getScore() {
        return $this->value;
    }
    
    abstract public function getBonus();
}
