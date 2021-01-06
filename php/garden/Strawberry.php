<?php

class Strawberry extends Berries{
    public int $berriesAmount = 0;
    public int $bushID = 0;
    public string $imgPath;
    public int $toGrow = 3;

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
    // METHODS THAT EXIST AT THE PARENT CLASS

    // public static function collectCrop($allBerries) 
    // {
    //     foreach($allBerries as $index => $berry) { 
    //         $berry = unserialize($berry);
    //         $berry->collectAll();
    //         $berry = serialize($berry); 
    //         $allBerries[$index] = $berry; 
    //     }
    //     return $allBerries;
    // }
    //
    // public function growBerries(){
    //     $this->berriesAmount = $this->berriesAmount + $this->toGrow;
    //     $this->toGrow = rand(3, 7);
    // }
    //
    // public function collectAll(){
    //     $this->berriesAmount -= $this->berriesAmount;
    // }
    //
    // public function collect($howMuch){
    //     if($howMuch <= $this->berriesAmount){
    //         $this->berriesAmount -= $howMuch;
    //     }
    // }
}
