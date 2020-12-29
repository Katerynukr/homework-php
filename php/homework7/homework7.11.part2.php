<?php 
session_start();

if($_SESSION['g']['score1'] < 31 && $_SESSION['g']['score2'] < 31){
    /*if first player throws a dice*/ 
    if(isset($_POST['throw1'])){
        foreach($_SESSION['g'] as $index => &$value){
            if($index == 'score1'){
                $value += rand(1,6);
            }
        }
        $_SESSION['turn'] +=1;
        header("Location: http://localhost/try/php/homework7/homework7.11.part2.php");
        exit; 
    }

    /*if second player throws a dice*/ 
    if(isset($_POST['throw2'])){
        foreach($_SESSION['g'] as $index => &$value){
            if($index == 'score2'){
                $value += rand(1,6);
            }
        }
        unset($value);
        $_SESSION['turn'] +=1;
        header("Location: http://localhost/try/php/homework7/homework7.11.part2.php");
        exit; 
    }
} else {
    if($_SESSION['g']['score1'] > $_SESSION['g']['score2']){
        echo 'the winner is player1 ';
        session_abort();
    } elseif ($_SESSION['g']['score1'] < $_SESSION['g']['score2']){
        echo 'the winner is player2';
        session_abort();
    } else {
        echo 'both have same value';
    }
    
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
<?php if($_SERVER['REQUEST_METHOD'] === 'GET'):?>
    <?php if($_SESSION['turn'] % 2 === 0):?>
    <form action="" method="post">
        <?= $_SESSION['g']['player1']?> : <button type="submit" name="throw1">throw a dice</button>
    </form>
    <?php endif ?>

    <?php if($_SESSION['turn'] % 2 !== 0): ?>
        <form action="" method="post">
            <?= $_SESSION['g']['player2']?> : <button type="submit" name="throw2">throw a dice</button>
        </form>
    <?php endif ?>
<?php endif ?>
    <?php print_r($_SESSION['g'])?>
    <?php echo $_SESSION['g']['score1']?>
</body>
