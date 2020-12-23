<?php
session_start();
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
    background:<?= $backgroundColor ?>;
    color: <?= $color ?>;
}
.number {
    color: <?= $colornNumber ?>;
} 
</style>
<body>
<p>
Padarykite juodą puslapį, kuriame būtų POST forma, mygtukas ir atsitiktinis kiekis (3-10) 
checkbox su raidėm A,B,C… Padarykite taip, kad paspaudus mygtuką, fono spalva pasikeistų 
į baltą, forma išnyktų ir atsirastų skaičius, rodantis kiek buvo pažymėta checkboksų (ne kurie, o kiek). 
</p>
<form method="POST">
<input type="submit" name="submit" value="submit"><br>
<?php
$letters = range(chr(97),chr(107)); 
$rand = rand(3, 10);
$checked = 0;
for($i=0; $i < $rand; $i++){
    echo "<input type=\"checkbox\" name=\"letter[]\" value=\"letter[]\"><label>$letters[$i] </label><br>";
    
}
if(isset($_POST['submit'])){
    if(!empty($_POST['letter'])){
        foreach($_POST as $value){
            $checked++;
        }
        echo $checked;
    } else{
        echo'no entered value';
    }
}
// if($_SERVER['REQUEST_METHOD'] === 'POST'){
// if(isset($_POST['letter'])){
// if(!empty($_POST['letter'])) {
//     foreach($_POST['letter'] as $check) {
//         $_SESSION['letter'] = $check;
//     }
// }
// }
// }
// echo count($_SESSION);
$letterValue = ((isset($_POST['letter'])) ? array_sum((array)$_POST['letter']) : ((isset($_SESSION['letter'])) ? $_SESSION['letter'] : 0));

$_SESSION['letter'] = $letterValue;

echo count($_SESSION['letter']);
// echo count($_SESSION);
// if (!empty($_POST)){
//     $backgroundColor = 'white';
//     $color = 'black';
//     $colornNumber = 'red';
// if(isset($_POST['letter'])) {
//     print_r($_POST); //print all checked elements
//   }
//   $number = count($_POST['letter']);
//   echo "<p class=\"number\"> $number </p>";
//     } else {
//         $backgroundColor = 'black';
//         $color = 'white';
// }  
?>
</form>
</body>
