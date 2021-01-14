<?php 
use Katya\Electricity;

class House extends Electricity implements Light{
    public function __construct(){
        echo 'from house class';
    }

    public function turnOn(){
        echo 'light is on';
    }
    public function turnOff()
    {
        echo 'light is off';
    }
    public function disconnected(){
        echo 'due to technical problems the light in your house is disconnected'; 
    }
}