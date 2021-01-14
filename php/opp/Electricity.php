<?php 
namespace Katya;

abstract class Electricity{
    public function __construct(){
        echo 'electricity abstract class';
    }
    abstract public function turnOn();
    abstract public function turnOff();
    public function instruction(){
        echo 'this is an extraction how to use electricity in the house';
    }
}