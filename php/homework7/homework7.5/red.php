<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> WEB mechanika #5 </title>
</head>
<p>Sukurkite du atskirus puslapius blue.php ir red.php Juose sukurkite 
linkus į pačius save (abu į save ne į kitą puslapį!). Padarykite taip, 
kad paspaudus ant  linko puslapis ne tiesiog persikrautų, o PHP kodas 
(ne tiesiogiai html tagas!) naršyklę peradresuotų į kitą puslapį 
(iš raudono į mėlyną ir atvirkščiai).
</p>
<?php
echo  '<style>html{background-color: red;}</style>';

if(isset($_GET['main'])){
    header("Location: http://localhost/try/php/homework7.5/blue.php");
    exit;
}
?>
<a  href="?main" name="red">red</a>