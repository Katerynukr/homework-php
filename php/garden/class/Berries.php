<?php
namespace Garden;

abstract class Berries{
    public int $berriesAmount = 0;
    public int $toGrow = 3;

    abstract public static function collectCrop($allBerries);
  
    abstract public function collectAll();

    abstract public function collect($howMuch);
}

