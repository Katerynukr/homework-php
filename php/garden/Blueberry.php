<?php

class Blueberry{
    public int $berriesAmount = 0;
    public int $bushID = 0;
    public string $imgPath;
    public int $toGrow = 7;

    public function __construct( int $ID){
        $this->bushID = $ID;
        $rand = rand(1,3);
        if($rand == 2){
            $this->imgPath ='./img/blueberry1.png'; 
        } elseif($rand == 3){
            $this->imgPath ='./img/blueberry2.png';
        } else {
            $this->imgPath ='./img/blueberry3.png';
        }
    }
    

    public function growBerries(){
        $this->berriesAmount = $this->berriesAmount + $this->toGrow;
        $this->toGrow = rand(7, 10);
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
