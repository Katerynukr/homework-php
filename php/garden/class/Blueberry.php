<?php
namespace Garden;

class Blueberry extends Berries  implements Features{
    public int $berriesAmount = 0;
    public int $bushID = 0;
    public string $imgPath;
    public int $toGrow = 7;
    public $price = 9.80;
    public $name;
    public $priceUSD;

    public function __construct( int $ID, $USD){
        $this->name = 'blueberry';
        $this->bushID = $ID;
        $rand = rand(1,3);
        if($rand == 2){
            $this->imgPath ='./img/blueberry1.png'; 
        } elseif($rand == 3){
            $this->imgPath ='./img/blueberry2.png';
        } else {
            $this->imgPath ='./img/blueberry3.png';
        }
        $this->priceUSD = $this->price * $USD;
    }
    
    //OVERWRITTEN FUNCTION FROM INTERFACE

    public function growBerries(){
        $this->berriesAmount = $this->berriesAmount + $this->toGrow;
        $this->toGrow = rand(7, 10);
    }

    // METHODS THAT ARE DECLERED AT THE ABSTRACT PARENT CLASS
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
    
    public function collectAll(){
        $this->berriesAmount -= $this->berriesAmount;
    }
    
    public function collect($howMuch){
        if($howMuch <= $this->berriesAmount){
            $this->berriesAmount -= $howMuch;
        }
    }

}
