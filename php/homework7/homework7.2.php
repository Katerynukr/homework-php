<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> WEB mechanika #1 </title>
</head>
<p>
Sukurti puslapį panašų į 1 uždavinį, tiktai antro linko su perduodamu 
kintamuoju nedarykite, o vietoj to padarykite, URL eilutėje ranka įvedus 
GET kintamąjį color su HEX spalvos kodu (pvz color=ff1234) puslapio fono 
spalva pasidarytų tokios spalvos.
</p>
<a  href="?">homework7</a><br>
<form action="" method="get">
<input type="text" name="color">
<button type="submit"></buttons>
</form>
<?php
echo  '<style>html{background-color: black;}</style>';
if(!empty($_GET)){
    $colorCode = $_GET['color'];
    echo 'enter HEX color to change the background of page<br>';
    echo '<style>html{background-color:#'.$colorCode . ';}</style>';
}
?>

