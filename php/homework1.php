<p>Ex: 1.</p>
<p>Sukurkite 4 kintamuosius, kurie saugotų jūsų vardą, pavardę, gimimo metus ir šiuos metus (nebūtinai tikrus).
Parašykite kodą, kuris pagal gimimo metus paskaičiuotų jūsų amžių ir naudodamas vardo ir pavardės
kintamuosius atspausdintų tokį sakinį :
"Aš esu Vardenis Pavardenis. Man yra XX metai(ų)".</p>
<?php 
$name = 'Santa';
$surname = 'liucia';
$birthYear = 1994;
$currentYear = 2020;
$age = $currentYear - $birthYear;
echo ("My name is " . $name . " " . $surname . ". <br> I am " . $age . " years old.");
?>

<p>-----------------------------------</p>
<p>Ex: 2.</p>
<p>Naudokite funkcija rand(). 
Sukurkite du kintamuosius ir naudodamiesi funkcija rand() jiems priskirkite atsitiktines reikšmes nuo 0 iki 4. 
Didesnę reikšmę padalinkite iš mažesnės. Atspausdinkite rezultatą jį suapvalinę iki 2 skaičių po kablelio.</p>
<?php
$first = rand(0, 4);
$second = rand(0, 4);
if($first > $second){
    echo round(($first / $second), 2);
} else {
    echo round(($second / $first), 2);
}
?>

<p>-----------------------------------</p>
<p>Ex: 3.</p>
<p>Naudokite funkcija rand(). 
Sukurkite tris kintamuosius ir naudodamiesi funkcija rand() jiems priskirkite atsitiktines reikšmes nuo 0 iki 25.
Raskite ir atspausdinkite kintąmąjį turintį vidurinę reikšmę.</p>
<?php
$one = rand(0, 25);
$two = rand(0, 25);
$tree = rand(0, 25);
echo ("Number 1: " . $one . "<br> " . "Number 2: " . $two . " <br>" . " Number 3: " . $tree . "<br>") ;
if(($one < $two && $one > $tree)||($one > $two && $one < $tree)){
    var_dump($one) ;
} elseif (($two < $one && $two > $tree) || ($two > $one && $two < $tree)){
    var_dump($two);
} elseif (($tree < $two && $tree > $one)||($tree > $two && $tree < $one)){
    var_dump($tree) ;
} else {
    echo 'no condition was met';
}
?>

<p>-----------------------------------</p>
<p>Ex: 4.</p>
<p>Įvedami skaičiai -a, b, c –kraštinių ilgiai, trys kintamieji (naudokite ​rand()​ funkcija nuo 1 iki 10). 
Parašykite PHP programą, kuri nustatytų, ar galima sudaryti trikampį ir atsakymą atspausdintų. </p>
<?php
$a = rand(1, 10);
$b = rand(1, 10);
$c = rand(1, 10);
if(($a < ($b+$c)) && ($b < ($a + $c)) && ($c < ($a+$b)) ){
    echo 'it is possible to create a triangle';
} else {
    echo 'it is impossible to create a triangle';
}
?>


<p>-----------------------------------</p>
<p>Ex: 5.</p>
<p> Sukurkite keturis kintamuosius ir ​rand()​ funkcija sugeneruokite jiems 
reikšmes nuo 0 iki 2. Suskaičiuokite kiek yra nulių, vienetų ir dvejetų. (sprendimui masyvo nenaudoti).
</p> 
<?php
$n1 = rand(0, 2);
$n2 = rand(0, 2);
$n3 = rand(0, 2);
$n4 = rand(0, 2);
$howManyZero = 0;
$howManyOne = 0;
$howManyTwo = 0;
if($n1 === 0){
    $howManyZero += 1;
} 
if ($n2 === 0){
    $howManyZero += 1;
} 
if ($n3 === 0){
    $howManyZero += 1;
} 
if($n4 === 0){
    $howManyZero += 1;
}
if ($n1 === 1){
    $howManyOne += 1;
} 
if ($n2 === 1){
    $howManyOne += 1;
} 
if ($n3 === 1){
    $howManyOne += 1;
} 
if($n4 === 1){
    $howManyOne += 1;
}
if ($n1 === 2){
    $howManyTwo += 1;
} 
if ($n2 === 2){
    $howManyTwo += 1;
} 
if ($n3 === 2){
    $howManyTwo += 1;
} 
if($n4 === 2){
    $howManyTwo += 1;
}
echo "there is " . $howManyZero . " of 0" . "<br>";
echo "there is " . $howManyOne . " of 1" . "<br>";
echo "there is " . $howManyTwo . " of 2". "<br>";
?>

<p>-----------------------------------</p>
<p>Ex: 6.</p>
<p> Naudokite funkcija rand(). 
Sugeneruokite atsitiktinį skaičių nuo 1 iki 6 ir jį atspausdinkite atitinkame h tage.
Pvz skaičius 3- rezultatas: <h3>3</h3></p> 
<?php
echo "<h3>" . rand(1, 6) . "</h3>";
?>

<p>-----------------------------------</p>
<p>Ex: 7.</p>
<p>Naudokite funkcija rand(). Atspausdinkite 3 skaičius nuo -10 iki 10.
 Skaičiai mažesni už 0 turi būti žali, 0 - raudonas, didesni už 0 mėlyni.</p> 
<?php
$number1 = rand(-10, 10);
if($number1 < 0)
echo "<p style=\"color:green\";>". $number1 . "</p>";
elseif ($number1 === 0 )
echo "<p style=\"color:red\";>". $number1 . "</p>";
else
echo "<p style=\"color:blue\";>". $number1 . "</p>";
$number2 = rand(-10, 10);
if($number2 < 0)
echo "<p style=\"color:green\";>". $number2 . "</p>";
elseif ($number2 === 0 )
echo "<p style=\"color:red\";>". $number2 . "</p>";
else
echo "<p style=\"color:blue\";>". $number2 . "</p>";
$number3 = rand(-10, 10);
if($number3 < 0)
echo "<p style=\"color:green\";>". $number3 . "</p>";
elseif ($number3 === 0 )
echo "<p style=\"color:red\";>". $number3 . "</p>";
else
echo "<p style=\"color:blue\";>". $number3 . "</p>";
?>

<p>-----------------------------------</p>
<p>Ex: 8.</p>
<p> Įmonė parduoda žvakes po 1 EUR. Perkant daugiau kaip už 1000 EUR taikoma 3 % nuolaida, daugiau kaip už 2000 EUR - 4 % nuolaida. 
Parašykite programą, kuri skaičiuos žvakių kainą ir atspausdintų atsakymą kiek žvakių ir kokia kaina perkama.
 Žvakių kiekį generuokite ​rand()​ funkcija nuo 5 iki 3000.</p> 
<?php
$candlesAmount = rand(5, 3000); 
    function price($candlesAmount){
        $priceOfCandle = 1;
        $toBePaid = $candlesAmount * $priceOfCandle;
        if( $toBePaid >= 1000 && $toBePaid < 2000){
           $toBePaid = (3 * $toBePaid) / 100;
           $priceOfCandle = $priceOfCandle - ($toBePaid / $candlesAmount);
           echo "a price for one candle is " . $priceOfCandle . "<br>";
           echo "number of candles to be bought " . $candlesAmount . "<br>";
        } elseif( $toBePaid >= 2000){
            $toBePaid = (4 * $toBePaid) / 100;
            $priceOfCandle = $priceOfCandle - ($toBePaid / $candlesAmount);
            echo "a price for one candle is " . $priceOfCandle . "<br>";
           echo "number of candles to be bought " . $candlesAmount . "<br>";
         } else {
            echo "a price for one candle is " . $priceOfCandle . "<br>";
           echo "number of candles to be bought " . $candlesAmount . "<br>";
         }
    }
    price($candlesAmount);
?>

<p>-----------------------------------</p>
<p>Ex: 9.</p>
<p> Naudokite funkcija rand(). Sukurkite tris kintamuosius su atsitiktinėm reikšmėm nuo 0 iki 100.
 Paskaičiuokite jų aritmetinį vidurkį. Ir aritmetinį vidurkį atmetus tas reikšmes, kurios yra mažesnės nei 10 arba didesnės nei 90. 
 Abu vidurkius atspausdinkite. Rezultatus apvalinkite iki sveiko skaičiaus.</p> 
<?php
$rand1 = rand(0, 100);
$rand2 = rand(0, 100);
$rand3 = rand(0, 100);
$avarage = ($rand1 + $rand2 + $rand3) / 3;
echo $avarage;
?>

<p>-----------------------------------</p>
<p>Ex: 10.</p>
<p> Padarykite skaitmeninį laikrodį, rodantį valandas, minutes ir sekundes.
 Valandom, minutėm ir sekundėm sugeneruoti panaudokite funkciją rand().
  Sugeneruokite skaičių nuo 0 iki 300. Tai papildomos sekundės. Skaičių pridėkite prie jau sugeneruoto laiko. 
  Atspausdinkite laikrodį prieš ir po sekundžių pridėjimo ir pridedamų sekundžių skaičių.</p> 
<?php
$hour = rand(0, 23);
$min = rand(0, 59);
$sec = rand(0, 59);
echo "Before time was: " . $hour . " hours :" . $min . " minutes :" . $sec ."seconds <br>";
$additionalSeconds = rand(0, 300);
if($additionalSeconds < 60){
    $sec += $additionalSeconds;
    if($sec > 59){
        $sec -= $additionalSeconds;
        $min += 1;
    }
} elseif ($additionalSeconds >= 60 && $additionalSeconds < 120){
    if($min > 58){
        $hour +=1;
    }
    $min += 1;
} elseif ($additionalSeconds >= 120 && $additionalSeconds < 180){
    if($min === 58){
        $hour +=1;
    } elseif (min ===59 ){
        $hour +=1;
        $min += 1;
    }
    $min += 2;
} elseif ($additionalSeconds >= 180 && $additionalSeconds < 240){
    if($min === 57){
        $hour += 1;
        $min +=1;
    }
    elseif($min === 58){
        $hour +=1;
        $min += 2;
    } elseif (min ===59 ){
        $hour +=1;
        $min += 3;
    }
    $min += 3;
} elseif ($additionalSeconds >= 240 && $additionalSeconds < 300){
    if($min === 56){
        $hour += 1;
    }
    elseif($min === 57){
        $hour += 1;
        $min +=1;
    }
    elseif($min === 58){
        $hour +=1;
        $min += 2;
    } elseif (min ===59 ){
        $hour +=1;
        $min += 3;
    }
    $min += 4;
} else {
    $min +=5;
}
echo "After time became: " . $hour . " hours :" . $min . " minutes :" . $sec ."seconds";
?>

