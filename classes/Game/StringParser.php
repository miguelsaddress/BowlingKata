<?php
namespace Bowling\Game;


class StringParser {
    const STRIKE_CHAR = "X";
    const SPARE_CHAR = "/";

    private $rolls = [];

    public function __construct($rolls) {
        $this->rolls = str_split($rolls);
    }

    public function asRollsArray() {
        $rolls = [];
        $len = count($this->rolls);
        for ($i=0; $i < $len; $i++) {
            $rolls[] = $this->getRoll($i);
        }
        return $rolls;
    }

    private function getRoll($i) {
        $strRoll = $this->rolls[$i];

        switch (true) {
            case $this->isNumericRoll($strRoll):
                return new NumericRoll(intval($strRoll));
                break;
            case $this->isSpareRoll($strRoll):
                $previous = $this->getPreviousRollValue($i);
                $bonus = $this->getNextRollFor($i);
                return new SpareRoll($previous, $bonus);
                break;
            case $this->isStrikeRoll($strRoll):
                $bonus1 = $this->getNextRollFor($i);
                $bonus2 = $this->getNextRollFor($i+1);
                return new StrikeRoll($bonus1, $bonus2);
                break;
            default:
                return new MissRoll();
        }
    }

    private function getPreviousRollValue($i) {
        $previous = ($i >= 1 ) ? $this->rolls[$i-1] : 0;
        return $previous;
    }

    private function getNextRollFor($i) {
        $next = $i+1;
        $bonus = ($next < count($this->rolls)) 
                ? $this->getRoll($next) 
                : new MissRoll();
        return $bonus;
    }

    private function isNumericRoll($roll) {
        return (intval($roll)) ? true : false;
    }

    private function isSpareRoll($roll) {
        return ($roll == self::SPARE_CHAR) ? true : false;
    }

    private function isStrikeRoll($roll) {
        return ($roll == self::STRIKE_CHAR) ? true : false;
    }

}
