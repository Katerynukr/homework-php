<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> WEB mechanika #1 </title>
</head>
<p>Sukurkite du puslapius lemon.php ir orange.php. Jų fonus 
nuspalvinkite atitinkamom spalvom. Į lemon.php puslapį įdėkite kodą,
kuris naršyklę visada peradresuotų į puslapį orange.php. Pademonstruokite 
veikimą.
</p>
<?php
echo  '<style>html{background-color: yellow;}</style>';

header("Location: http://localhost/try/php/homework7/homework7.4/orange.php");
exit;

?>