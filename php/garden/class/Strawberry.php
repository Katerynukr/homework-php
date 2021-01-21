<?php
namespace Garden;

class Strawberry extends Berries implements Features{
    public int $berriesAmount = 0;
    public int $bushID = 0;
    public string $imgPath;
    public int $toGrow = 3;
    public $price = 4.90;
    public $name;
    public $priceUSD;

    public function __construct( int $ID, $USD){
        $this->name = 'strawberry';
        $this->bushID = $ID;
        $rand = rand(2,4);
        if($rand == 2){
            $this->imgPath ='./img/strawberry2.png'; 
        } elseif($rand == 3){
            $this->imgPath ='./img/strawberry3.png';
        } else {
            $this->imgPath ='./img/strawberry4.png';
        }
        $this->priceUSD = $this->price * $USD;
    }

    //OVERWRITTEN FUNCTION FROM INTERFACE
    public function growBerries(){
        $this->berriesAmount = $this->berriesAmount + $this->toGrow;
        $this->toGrow = rand(3, 7);
    }
    
    // METHODS THAT ARE DECLERED AT THE ABSTRACT PARENT CLASS
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
   
    public function collectAll(){
        $this->berriesAmount -= $this->berriesAmount;
    }
    
    public function collect($howMuch){
        if($howMuch <= $this->berriesAmount){
            $this->berriesAmount -= $howMuch;
        }
    }
   
}
