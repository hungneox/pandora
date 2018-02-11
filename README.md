Pandora (Another PHP Dependency Injection Container)
======
[![Build Status](https://travis-ci.org/hungneox/pandora.svg?branch=master)](https://travis-ci.org/hungneox/pandora)

Installation
======
TODO

Usage
======


```php
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

// Container::hello();

Container::register("computer", function() {
    $keyboard = new Keyboard();
    $monitor = new Monitor();
    $computer = new Computer($monitor, $keyboard);
    return $computer;
});

$computer = Container::resolve('computer');
```