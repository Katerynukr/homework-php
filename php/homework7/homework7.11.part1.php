<?php 
session_start();
if(!isset($_SESSION['g'])){
    $_SESSION['g'] = [] ;
    $_SESSION['turn'] = 0;
}

/*if the start button was pressed*/ 
if(isset($_POST['start'])){
    $_SESSION['g'] = [
        'player1' => $_POST['player1'],
        'score1' => 0,
        'player2' => $_POST['player2'],
        'score2' => 0
    ];
    header('Location: http://localhost/try/php/homework7/homework7.11.part2.php');
    exit;  
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> WEB mechanika #7.11 </title>
</head>
<style>

</style>
<body>
<p>
Suprogramuokite žaidimą. Žaidimas prasideda dviem laukeliais, kuriuose žaidėjai įveda savo vardus 
ir mygtuku “pradėti”. Šone yra rodomas žaidėjų rezultatas. Paspaudus “pradėti” turi atsirasti pirmo
 žaidėjo vardas ir mygtukas “mesti kauliuką”. Jį nuspaudus skriptas automatiškai sugeneruoja skaičių 
 nuo 1 iki 6 ir jį prideda prie žaidėjo rezultato, o pirmo žaidėjo vardas pakeičiamas antro žaidėjo 
 vardu (parodo kieno eilė “mesti kauliuką”). Žaidimas tęsiamas iki tol, kol kažkuris žaidėjas surenka 
 30 taškų. Tada parodomas pranešimas apie laimėjimą ir vėl leidžiama suvesti žaidėjų vardus ir pradėti 
 žaidimą iš naujo. 
</p>
<?php print_r($_SESSION['g'])?>
    <form action="" method="post">
        <lable>player 1:</lable><input type="text" name="player1" >
        <lable>player 2:</lable><input type="text" name="player2" >
        <button type="submit" name="start">Start</button>
    </form>

</body>
