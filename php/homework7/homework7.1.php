<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> WEB mechanika #1 </title>
</head>
<p>Sukurti puslapį su juodu fonu ir su dviem linkais (nuorodom) į save.
 Viena nuoroda su failo vardu, o kita nuoroda su failo vardu ir GET duomenų  
 perdavimo metodu perduodamu kintamuoju color=1. Padaryti taip, kad paspaudus
ant nuorodos su perduodamu kintamuoju fonas nusidažytų raudonai, o paspaudus 
ant nuorodos be perduodamo kintamojo, vėl pasidarytų juodas.
</p>
<?php
echo  '<style>html{background-color: black;}</style>';
    if(isset($_GET)){
        if(1 == $_GET['color']){
            echo  '<style>html{background-color: red;}</style>';
        }
    }
    

?>
<a  href="?color=1">homework7</a><br>
<a  href="?">homework7</a>
