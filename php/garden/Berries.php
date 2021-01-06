<?php

class Berries{
    public int $berriesAmount = 0;
    public int $toGrow = 3;

    public static function collectCrop($allBerries)
    {
        foreach($allBerries as $index => $berry) {
            $berry = unserialize($berry); 
            $berry->collectAll();
            $berry = serialize($berry);
            $allBerries[$index] = $berry; 
        }
        return $allBerries;
    }

    public function __construct( ){
       
    }

    public function growBerries(){
        $this->berriesAmount = $this->berriesAmount + $this->toGrow;
        $this->toGrow = rand(3, 7);
    }

    public function collectAll(){
        $this->berriesAmount -= $this->berriesAmount;
    }

    public function collect($howMuch){
        if($howMuch <= $this->berriesAmount){
            $this->berriesAmount -= $howMuch;
        }
    }
}

