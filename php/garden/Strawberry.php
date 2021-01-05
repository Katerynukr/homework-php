<?php

class Strawberry{
    public int $berriesAmount = 0;
    public int $bushID = 0;
    public string $imgPath;
    public int $toGrow = 3;

    public static function collectCrop($allBerries) // <----- $visiAgurkai = $_SESSION['obj']
    {
        foreach($allBerries as $index => $berry) { // <---- serializuotas stringas
            $berry = unserialize($berry); // <----- agurko objektas
            $berry->collectAll();
            $berry = serialize($berry); // <------ vel stringas
            $allBerries[$index] = $berry; // <----- uzsaugom agurkus
        }
        return $allBerries;
    }

    public function __construct( int $ID){
        $this->bushID = $ID;
        $rand = rand(2,4);
        if($rand == 2){
            $this->imgPath ='./img/strawberry2.png'; 
        } elseif($rand == 3){
            $this->imgPath ='./img/strawberry3.png';
        } else {
            $this->imgPath ='./img/strawberry4.png';
        }
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
