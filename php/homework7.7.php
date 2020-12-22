<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> WEB mechanika #1 </title>
</head>
<p>
Pakartokite 6 uždavinį. Papildykite jį kodu, kuris naršyklę po POST metodo
 peradresuotų tuo pačiu adresu (t.y. į patį save) jau GET metodu.
</p>
<form action="?" method="get">
<input type="text" name="color" value="<?= $_GET['color'] ?? '' ?>">
<button type="submit">get</button>
</form>
<form action="?" method="post">
<input type="text" name="color" value="<?= $_POST['color'] ?? '' ?>">
<button type="submit">post</button>
</form>
<?php
if(isset($_GET['color'])){
    echo  '<style>html{background-color: green;}</style>';
}
if(isset($_POST['color'])){
    echo  '<style>html{background-color: yellow;}</style>';
    if(!empty($_POST)){
        header("Location: http://localhost/try/php/homework7.6.php");
        exit;
    }
}
?>
<!-- why was not working -->
