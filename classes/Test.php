<?php
namespace Bowling;

class Test extends \PHPUnit_Framework_TestCase
{

    static private $messages = array();

    static public function tearDownAfterClass() {
        echo PHP_EOL, implode(PHP_EOL, self::$messages);
    }

}