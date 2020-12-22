<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> WEB mechanika #1 </title>
</head>
<p>
Perdarykite 2 uždavinį taip, kad spalvą būtų galimą įrašyti į laukelį ir 
ją išsiųsti mygtuku GET metodu formoje.
</p>
<a  href="?">homework7</a><br>
<form action="" method="get">
<input type="text" name="color" value="<?= $_GET['color'] ?? '' ?>">
<button type="submit">enter HEX color to change the background of page</button>
</form>
<?php
echo  '<style>html{background-color: black;}</style>';
if(!empty($_GET)){
    $colorCode = $_GET['color'];
    echo '<style>html{background-color:#'.$colorCode . ';}</style>';
}
?>


<!-- what does this part means "$_GET['color'] ?? '' ?>"> -->