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
<button type="submit" name="color" value="get">get</button>
</form>
<form action="?" method="post">
<button type="submit" name="color" value="post">post</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'POST METODAS';
    echo  '<style>html{background-color: yellow;}</style>';
    // header("refresh:1; url=?color=get");
    header("Location: http://localhost/try/php/homework7/homework7.7.php?color=get");
    exit('POST METODAS');
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo 'GET METODAS';
    echo  '<style>html{background-color: green;}</style>';
}
?>

<!-- why when using location 302 and 200 but url just 200???? -->