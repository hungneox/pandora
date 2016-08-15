<?php

namespace Pandora;

class Container {

    public $registry = [];
    
    public static $instance = null;

    protected function register($key, $callback) 
    {
        $this->registry[$key] = $callback();
    }

    protected function resolve($key) 
    {
        if(empty($this->registry[$key])) {
            throw new Exception("Cannot resolve your class", 1);
        }

        return $this->registry[$key];
    }

    public static function __callStatic($method, $args)
    {
        if (static::$instance === null) {
            static::$instance = new Container;
        }

        return call_user_func_array([static::$instance, $method], $args);
    }
}