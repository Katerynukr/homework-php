<?php
session_start();
class Strawberry{
    public int $berriesAmount = 0;
    public int $bushID = 0;

    public function __construct( int $ID){
        $this->bushID = $ID;
    }

    public function growBerries(int $howMuch){
        $this->berriesAmount = $this->berriesAmount + $howMuch;
    }
}
