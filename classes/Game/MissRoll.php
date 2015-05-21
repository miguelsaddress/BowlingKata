<?php
namespace Bowling\Game;
use Bowling\Game\Roll;

class MissRoll extends NumericRoll {
    
    public function __construct() {
        parent::__construct(0);
    }

}
