<p>-----------------------------------</p>
<p>Ex: 1.</p>
<p>Sugeneruokite masyvą iš 10 elementų, kurio elementai 
    būtų masyvai iš 5 elementų su reikšmėmis nuo 5 iki 25.</p>

<?php
    $array1 = [];
    $newArray = [];
    foreach(range(0, 9) as $arr){
        foreach(range(0, 4) as $value){
            $array1[$value] = rand(5, 25);
        }
        $newArray[$arr] = $array1;
    }
    print_r($newArray);
?>

<p>-----------------------------------</p>
<p>Ex: 2.</p>
<p>Naudodamiesi 1 uždavinio masyvu:
A) Suskaičiuokite kiek masyve yra elementų didesnių už 10;
B) Raskite didžiausio elemento reikšmę;
C) Suskaičiuokite kiekvieno antro lygio masyvų su vienodais indeksais sumas (t.y. suma reikšmių turinčių indeksą 0, 1 ir t.t.)
D) Visus masyvus “pailginkite” iki 7 elementų
E) Suskaičiuokite kiekvieno iš antro lygio masyvų elementų sumą atskirai ir sumas panaudokite kaip reikšmes sukuriant naują masyvą. T.y. pirma naujo masyvo reikšmė turi būti lygi mažesnio masyvo, turinčio indeksą 0 dideliame masyve, visų elementų sumai 
</p>
<?php
    echo '<br>';
    echo 'condition : A <br>';
    $large = 0;
    foreach($newArray as $arr){
        foreach($arr as $value){
            if($value > 10 ){
                $large++;
            }
        }
    }
    echo $large . ' elements are larger than 10';
    echo '<br>';
    echo 'condition : B <br>';
    $largest = PHP_INT_MIN; 
    foreach($newArray as $arr){
        foreach($arr as $value){
            if($value > $largest ){
                $largest = $value;
            }
        }
    }
    echo 'The largest number in the array is ' . $largest; 
    echo '<br>';
    echo 'condition : C <br>';
    foreach($newArray as $arr){
        foreach($arr as $index =>$number){
            $values[$index] += $number; 
        }      
    } 
    foreach($values as $key => $value){
        echo "$key: $value";
    }
    echo '<br>';
    echo 'condition : D <br>';
    foreach(range(0, 9) as $arr){
        foreach(range(5, 6) as $value){
            $array1[$value] = rand(5, 25);
        }
        $newArray[$arr] = $array1;
    }
    print_r($newArray);
    echo '<br>';
    echo 'condition : E <br>';
    $arrayOfSum = [];
    foreach($newArray as$index=> $arr){
        $arrayOfSum[] = array_sum($arr);
    }
    echo ' The sum of each array :';
    print_r($arrayOfSum);  
?>

<p>-----------------------------------</p>
<p>Ex: 3.</p>
<p>Sukurkite masyvą iš 10 elementų. Kiekvienas masyvo elementas turi
     būti masyvas su atsitiktiniu kiekiu nuo 2 iki 20 elementų. Elementų 
     reikšmės atsitiktinai parinktos raidės iš intervalo A-Z. Išrūšiuokite 
     antro lygio masyvus pagal abėcėlę (t.y. tuos kur su raidėm).
</p>
 <?php
 $array3 = [];
 $arrayArray =[];
 foreach(range(0, 9) as $arr){
     foreach(range(2, rand(2, 20)) as $letter){
         $arrayArray[$letter] = chr(rand(65,90));
     }
     sort($arrayArray);
     $array3[$arr] = $arrayArray;
 }
    print_r($array3) . '<br>';  
?>
     
<p>-----------------------------------</p>
<p>Ex: 4.</p>
<p>Išrūšiuokite trečio uždavinio pirmo lygio masyvą taip, kad elementai kurių masyvai trumpiausi eitų pradžioje.</p>
<?php
sort($array3);
    print_r($array3);
?>

<p>-----------------------------------</p>
<p>Ex: 5.</p>
<p>Sukurkite masyvą iš 30 elementų. Kiekvienas masyvo elementas yra masyvas 
[user_id => xxx, place_in_row => xxx] user_id atsitiktinis unikalus skaičius nuo 
1 iki 1000000, place_in_row atsitiktinis skaičius nuo 0 iki 100. </p>
<?php
$array5 = [];
foreach(range(0, 30) as $array){
    $array5[$array] = ['user_id' => rand(1, 1000000), 'place_in_row' => rand(0, 100)];
}
print_r($array5);
?>

<p>-----------------------------------</p>
<p>Ex: 6.</p>
<p>Išrūšiuokite 5 uždavinio masyvą pagal user_id didėjančia tvarka.
 Ir paskui išrūšiuokite pagal place_in_row mažėjančia tvarka.</p>
<?php
$array6 = $array5;
array_multisort( array_column($array6, 'user_id'), SORT_ASC, $array6 );
print_r($array6);
echo '<br><br>';
array_multisort( array_column($array6, 'place_in_row'), SORT_DESC, $array6 );
print_r($array6);
?>

<p>-----------------------------------</p>
<p>Ex: 7.</p>
<p>Prie 6 uždavinio masyvo antro lygio masyvų pridėkite dar du elementus: name ir 
surname. Elementus užpildykite stringais iš atsitiktinai sugeneruotų lotyniškų 
raidžių, kurių ilgiai nuo 5 iki 15.</p>
<?php
foreach($array6 as  $index =>&$array){
            $wordName = '';
            $wordSurname = '';
            $randName = rand(5, 15);
            $randSurname = rand(5, 15);
            for($i = 0 ; $i < $randName; $i++){
                $wordName .= chr(rand(65,90));
            }
            for($i = 0 ; $i< $randSurname; $i++){
                $wordSurname .= chr(rand(65,90));
            }
            $array6[$index]['name']= $wordName;
            $array6[$index]['surname'] = $wordSurname;
        }
    print_r($array6);
?>

<p>-----------------------------------</p>
<p>Ex: 8.</p>
<p>Sukurkite masyvą iš 10 elementų. Masyvo reikšmes užpildykite pagal taisyklę: 
generuokite skaičių nuo 0 iki 5. Ir sukurkite tokio ilgio masyvą. Jeigu reikšmė 
yra 0 masyvo nekurkite. Antro lygio masyvo reikšmes užpildykite atsitiktiniais skaičiais nuo 0 iki 10. 
Ten kur masyvo nekūrėte reikšmę nuo 0 iki 10 įrašykite tiesiogiai.</p>
<?php
$array8=[];
$subArray = [];
foreach(range(0, 9 )as $sub){
    $random = rand(0, 5);
    if($random === 0){
        $array8[$sub] = rand(0, 10);
    } else {
        foreach(range(0, $random) as $value){
            $subArray[$value] = rand(0, 10);
        }
        $array8[$sub] = $subArray; 
    }
}
print_r($array8);
?>

<p>-----------------------------------</p>
<p>Ex: 9.</p>
<p>Paskaičiuokite 8 uždavinio masyvo visų reikšmių sumą ir išrūšiuokite masyvą taip,
 kad pirmiausiai eitų mažiausios masyvo reikšmės arba jeigu reikšmė yra masyvas, 
 to masyvo reikšmių sumos.</p>
<?php
$array9 = $array8;
function sortingBySum($a, $b){
    $A = is_array($a) ? array_sum($a) : $a;
    $B = is_array($b) ? array_sum($b) : $b;
    return $a <=> $b;
}
usort($array9, 'sortingBySum');
print_r($array9);
?>

<p>-----------------------------------</p>
<p>Ex: 10.</p>
<p>Sukurkite masyvą iš 10 elementų. Jo reikšmės masyvai iš 10 elementų. 
Antro lygio masyvų reikšmės masyvai su dviem elementais value ir color. 
Reikšmė value vienas iš atsitiktinai parinktų simbolių: #%+*@裡, o reikšmė 
color atsitiktinai sugeneruota spalva formatu: #XXXXXX. Pasinaudoję masyvų atspausdinkite
 “kvadratą” kurį sudarytų masyvo reikšmės nuspalvintos spalva color.</p>
<?php

$array10 = [];

foreach(range(0,9) as $arr){
    foreach(range(0,9) as $color){
        $key = explode(' ', '# % + * @ 裡 ')[rand(0, 5)];
        $value = '#'.substr(md5(rand(0, 99)), 0, 6);
        $array10[$arr][$color] = array('key'=> $key, 'value'=> $value);
    }
}
print_r($array10);
echo '<br>';
foreach ($array10 as $array) {
    foreach ($array as $symbol) {
        echo "<div style= \"display:inline-block; height: 20px; width: 20px; color:" . $symbol['value'] . "\">". $symbol['key'] . "</div>";
    }
    echo '<br>';
}
?>

<p>-----------------------------------</p>
<p>Ex: 11.</p>
<p>
Duotas kodas, generuojantis masyvą:
do {
    $a = rand(0, 1000);
    $b = rand(0, 1000);
} while ($a == $b);
$long = rand(10,30);
$sk1 = $sk2 = 0;
echo '<h3>Skaičiai '.$a.' ir '.$b.'</h3>';
$c = [];
for ($i=0; $i<$long; $i++) {
    $c[] = array_rand(array_flip([$a, $b]));
}
echo '<h4>Masyvas:</h4>';
echo '<pre>';
print_r($c);
echo '</pre>';
Reikia apskaičiuoti kiek buvo $sk1 ir $sk2 naudojantis matematika.
NEGALIMA! naudoti jokių palyginimo operatorių (if-else, swich, ()?:)
NEGALIMA! naudoti jokių regex ir string funkcijų.
GALIMA naudotis tik aritmetiniais veiksmais ir matematinėmis funkcijomis iš skyrelio: https://www.php.net/manual/en/ref.math.php
Jeigu reikia, kodo patogumui galima panaudoti įvairias funkcijas, bet sprendimo pagrindas turi būti matematinis.
Atsakymą reikia pateikti formatu:
echo '<h3>Skaičius 789 yra pakartotas '.$sk1.' kartų, o skaičius 123 - '.$sk2.' kartų.</h3>';
Kur rudi skaičiai yra pakeisti skaičiais $a ir $b generuojamais kodo.</p>
<?php
do {
    $a = rand(0, 1000);
    $b = rand(0, 1000);
} while ($a == $b);
$long = rand(10,30);
$sk1 = $sk2 = 0;
echo '<h3>Skaičiai '.$a.' ir '.$b.'</h3>';
$c = [];
for ($i=0; $i<$long; $i++) {
    $c[] = array_rand(array_flip([$a, $b]));
}
echo '<h4>Masyvas:</h4>';
echo '<pre>';
print_r($c);
echo '</pre>';
foreach($c as $number){
    $sk1 = round($number / ($a+$b));
}
$sk2 = count($c) - $sk1;
$a = '<span>' . max($c) . '</span>';
$b = '<span>' . min($c) . '</span>';
echo '<h4>Number ' . $a . ' was used ' . $sk1 . ' times and number ' . $b . ' - ' . $sk2 . ' times.</h4>'
?>

