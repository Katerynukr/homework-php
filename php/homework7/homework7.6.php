<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> WEB mechanika #1 </title>
</head>
<p>
Padarykite puslapį su dviem mygtukais. Mygtukus įdėkite į dvi 
skairtingas formas- vieną GET ir kitą POST. Nenaudodami jokių 
konkrečių $_GET ar $_POST reikšmių, o tik tikrindami pačius masyvus, 
nuspalvinkite foną žaliai, kai paspaustas mygtukas iš GET formos ir 
geltonai- kai iš POST.
</p>
<form action="?" method="get">
<button type="submit">get</button>
</form>
<form action="?" method="post">
<button type="submit">post</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'POST METODAS';
    echo  '<style>html{background-color: yellow;}</style>';
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo 'GET METODAS';
    echo  '<style>html{background-color: green;}</style>';
}
?>
