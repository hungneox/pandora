<?php

namespace Neox\Pandora\Tests;

use Neox\Pandora\Container;

class ContainerTest extends TestCase
{
    public function testRegister()
    {
        Container::register("computer", function() {
            $keyboard = new Keyboard();
            $monitor = new Monitor();
            $computer = new Computer($monitor, $keyboard);
            return $computer;
        });

        $computer = Container::resolve('computer');

        $this->assertEquals(Computer::class, get_class($computer));
    }
}



class Keyboard {}
class Monitor {}

class Computer {
    public $keyboard;
    public $monitor;
    public function __construct($monitor, $keyboard) {
        $this->monitor = $monitor;
        $this->keyboard = $keyboard;
    }
}

