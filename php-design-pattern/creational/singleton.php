<?php

class Customer
{
    private static $instance;

    public function __construct()
    {
        if (!self::$instance) {
            self::$instance = $this;

            echo "New Instance".PHP_EOL;

            return self::$instance;
        } else {
            echo "Old instance".PHP_EOL;

            return self::$instance;
        }
    }
}

$a = new Customer();
$b = new Customer();
$c = new Customer();


// different
class ServiceLocator
{
    public $instances = [];

    public function make($abstract, $concrete)
    {
        if (isset($instances[$abstract])) {
            echo "I'm Old Instance of".$abstract.PHP_EOL;
            return $this->instances[$abstract];
        }

        $object = new $concrete();
        $this->instances[$abstract] = $concrete;
        echo "I'm New Instance of".$abstract.PHP_EOL;
        return $object;
    }
}

class TypeEngine
{

}

$singleton = new ServiceLocator();
$a = $singleton->make('engine', 'TypeEngine');
$b = $singleton->make('engine', 'TypeEngine');
$c = $singleton->make('engine', 'TypeEngine');