<?php
session_start();
$_SESSION['page1'] = 'pink';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $coockie = setcookie('pink', 'redirection');
    header("Location: http://localhost/try/php/homework7/homework7.8/rose.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> WEB mechanika #7.8 </title>
</head>
<style>
body {
    background: pink;
}
body a {
    color: #777;
}
</style>
<body>
<p>
Sukurkite du puslapius pink.php ir rose.php. Nuspalvinkite juos atitinkamo spalvom. 
Į pink.php puslapį įdėkite formą su POST metodu ir mygtuku “GO TO ROSE”. Formą nukreipkite, 
kad ji atsidarinėtų rose.php puslapyje. Padarykite taip, kad surinkus naršyklėje tiesiogiai 
adresą į rose.php puslapį, naršyklė būtų peradresuojama į pink.php puslapį. 
</p>
<form method="POST">
<button type="submit">GO TO ROSE</button>
</form>
</body>


<!-- how to make it with session -->