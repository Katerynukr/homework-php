<?php
include __DIR__.'/Electricity.php';
include __DIR__.'/Light.php';
include __DIR__.'/House.php';

$obj = new House();
echo'<br>';
$obj->turnOn();
echo'<br>';
$obj->turnOff();
echo'<br>';
$obj->instruction();
echo'<br>';
$obj->disconnected();