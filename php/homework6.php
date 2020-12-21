<p>-----------------------------------</p>
<p>Ex: 1.</p>
<p>Parašykite funkciją, kurios argumentas būtų tekstas, kuris 
    yra įterpiamas į h1 tagą</p>
<?php
    function task1($text){
        return "<h1>$text</h1>";
    }
    $sentance = 'BREAKING NEWS';
    echo task1($sentance);
?>
<p>-----------------------------------</p>
<p>Ex: 2.</p>
<p>Parašykite funkciją su dviem argumentais, pirmas argumentas 
tekstas, įterpiamas į h tagą, o antrasis tago numeris (1-6). 
Rašydami šią funkciją remkitės pirmame uždavinyje parašytą funkciją;
</p>
<?php
function task2($number, $text){
    return "<h$number>$text</h$number>";
}
echo task2(6, 'Hello,world!');
?>
<p>-----------------------------------</p>
<p>Ex: 3.</p>
<p>Generuokite atsitiktinį stringą, pasinaudodami kodu md5(time()).
 Visus skaitmenis stringe įdėkite į h1 tagą. Jegu iš eilės eina keli skaitmenys, 
 juos į tagą reikią dėti kartu (h1 atsidaro prieš pirmą ir užsidaro po paskutinio) 
 Keitimui naudokite pirmo uždavinio funkciją;
</p>
<?php
$string =  md5(time());
echo $string;

echo preg_replace_callback('/\d+/m',function($matches){
    foreach($matches as $index=>$letter){
        return "<h1>$matches[$index]</h1>";
    }
} ,$string );

// $final = '';
// $numeric ='';
// for($i=0; $i<strlen($string);$i++){
//     if(is_numeric($string[$i]) && empty($numeric) && (!is_numeric($string[$i+1]))){
//         $numeric .= '<h1>';
//         $numeric .=$string[$i];
//         $numeric .= '</h1>';
//         $final .= $numeric;
//         $numeric = '';
//         echo $string[$i];
//     } elseif(is_numeric($string[$i]) && empty($numeric) && is_numeric($string[$i+1])){
//         $numeric .= '<h1>';
//         $numeric .=$string[$i];
//     }elseif(is_numeric($string[$i])&& is_numeric($string[$i+1])&& !empty($numeric)){
//          $numeric .=$string[$i];
//     } elseif(is_numeric($string[$i])&& !is_numeric($string[$i+1])&& !empty($numeric)){
//         $numeric .=$string[$i];
//         $numeric .= '</h1>';
//         $final .= $numeric;
//         $numeric = '';
//     } elseif(is_numeric($string[$i])&& [i+1] ===strlen($string) ){
//         $numeric .=$string[$i];
//         $numeric .= '</h1>';
//         $final .= $numeric;
//         $numeric = '';
//     } else{
//        $final .= '<h1>';
//        $final .=  $string[$i];
//        $final .= '</h1>';
//     }
// }

// for($i=0; $i<strlen($string);$i++){
//     if(is_numeric($string[$i])){
//         $numeric .=$string[$i];
//         if([$i] ===strlen($string)-1){
//             $final .= "</h1>";
//         }
//     }
//     else{
//         if(is_numeric($string[$i-1])){
//             $final .= "<h1>$numeric</h1><h1>";
//             $numeric = '';
//         }
//         $final .=$string[$i];
//         if([$i] ===strlen($string)-1){
//             $final .= "</h1>";
//         }
//         if(is_numeric($string[$i+1])){
//             $final .= "</h1>";
//         }
        
//     }
//     if([$i] === (strlen($string)-1) && !empty($numeric)){
//         $final .= "<h1>$numeric</h1>;
//     }

// }
// echo $final;
?>

<p>-----------------------------------</p>
<p>Ex: 4.</p>
<p>Parašykite funkciją, kuri skaičiuotų, iš kiek sveikų skaičių jos 
argumentas dalijasi be liekanos (išskyrus vienetą ir patį save) 
Argumentą užrašykite taip, kad būtų galima įvesti tik sveiką skaičių;</p>
<?php
function numbers($number){
    $count = 0;
    for($i=2; $i<$number; $i++){
        if($number % $i === 0){
            $count++;
        }
    }
    if($count === 0){
        return false;
    }
    return 'the number ' . $number . ' can be devided without leftover by ' . $count . ' numbers.';
}
$value = 678;
if($value>0){
echo numbers($value);
}
?>
<p>-----------------------------------</p>
<p>Ex: 5.</p>
<p>Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai
 nuo 33 iki 77. Išrūšiuokite masyvą pagal daliklių be liekanos kiekį mažėjimo
  tvarka, panaudodami ketvirto uždavinio funkciją.
</p>
<?php
$array = [];
foreach(range(0,100) as $value){
    $array[] = rand(33, 77);
}
print_r($array);
echo '<br>';
usort($array , function($a, $b){
    return numbers($b) <=> numbers($a);
});
print_r($array);
?>

<p>-----------------------------------</p>
<p>Ex: 6.</p>
<p>Sugeneruokite masyvą iš 100 elementų, kurio reikšmės 
    atsitiktiniai skaičiai nuo 333 iki 777. Naudodami 4 uždavinio 
    funkciją iš masyvo ištrinkite pirminius skaičius.</p>
<?php
$arr =[];
foreach(range(0,99) as $value){
    $arr[] = rand(333, 773);
}
print_r($arr);
echo '<br>';
foreach($arr as $value){
    if(numbers($value) ===false){
        echo $value . ' is a primitive value <br>';
    } 
}

?>
<p>-----------------------------------</p>
<p>Ex: 7.</p>
<p>Sugeneruokite atsitiktinio (nuo 10 iki 20) ilgio masyvą, kurio visi, 
išskyrus paskutinį, elementai yra atsitiktiniai skaičiai nuo 0 iki 10,
 o paskutinis masyvas, kuris generuojamas pagal tokią pat salygą kaip 
 ir pirmasis masyvas. Viską pakartokite atsitiktinį nuo 10 iki 30  kiekį kartų. 
 Paskutinio masyvo paskutinis elementas yra lygus 0;</p>
<?php
function rec($times){
        $array = [];
        $to = rand(10, 20);
        if($times === 1){
            $times--;
            $array = [];
            $to = rand(10, 20);
            foreach(range(0, $to) as $index=>$element) {
                if($index === $to){
                    $array[] = 0;
                } else{
                    $array[] = rand(0, 10);
                }
            }
        }else{
            if($times !== 0){
                foreach(range(0, $to) as $index=>$element){
                    if($index === $to){
                        $times--;
                        $array[] = rec($times);
                    } else {
                        $array[] = rand(0, 10);
                    }
                }
            }
        }
    return $array;
}

print_r(rec(5));

?>
<p>-----------------------------------</p>
<p>Ex: 8.</p>
<p>Suskaičiuokite septinto uždavinio elementų, kurie nėra masyvai, sumą.
</p>
<?php
function countElem($arr){
    $array = $arr;
    static $circle = 0;
    $sumOfElements = 0;
    foreach($array as $element){
        if(is_array($element)){
            $sumOfArray = 0;
            $circle++;
            echo "this is circle # $circle, and it's sum is  $sumOfElements <br>";
            $sumOfArray += countElem($element);
            $sumOfElements += $sumOfArray;
        } else {
            $sumOfElements += $element;
        }
    }
    return $sumOfElements;
}
echo countElem(rec(6));
?>
<p>-----------------------------------</p>
<p>Ex: 9.</p>
<p>Sugeneruokite masyvą iš trijų elementų, kurie yra atsitiktiniai skaičiai nuo 1 iki 33.
 Jeigu tarp trijų paskutinių elementų yra nors vienas ne pirminis skaičius, 
prie masyvo pridėkite dar vieną elementą- atsitiktinį skaičių nuo 1 iki 33. Vėl patikrinkite 
pradinę sąlygą ir jeigu reikia pridėkite dar vieną elementą. Kartokite, kol sąlyga nereikalaus 
pridėti elemento. </p>
<?php
    $array = [];

    foreach(range(1,3) as$value){
        $array[] = rand(1, 33);
    }
function arrayGenerator(&$array){
    if(count($array)>3){
        $nonPrimitive = 0;
        $lastTree= array_slice($array, -3, 3);
        foreach($lastTree as $value){
            if(numbers($value) !== false){
                $nonPrimitive++;
            }
        }
            if($nonPrimitive > 0){
                $array[] = rand(1, 33);
                arrayGenerator($array);
            }
     }
    if(count($array)===3){
    $nonPrimitive = 0;
        foreach($array as $value){
            if(numbers($value) !== false){
                $nonPrimitive++;
            }
            
        }
        if($nonPrimitive > 0){
            $array[] = rand(1, 33);
            arrayGenerator($array);
        }
    }
    return $array;
}
print_r(arrayGenerator($array));
?>
<p>-----------------------------------</p>
<p>Ex: 10.</p>
<p>Sugeneruokite masyvą iš 10 elementų, kurie yra masyvai iš 10 elementų, 
kurie yra atsitiktiniai skaičiai nuo 1 iki 100. Jeigu tokio masyvo pirminių 
skaičių vidurkis mažesnis už 70, suraskite masyve mažiausią skaičių (nebūtinai pirminį) 
ir prie jo pridėkite 3. Vėl paskaičiuokite masyvo pirminių skaičių vidurkį ir
jeigu mažesnis nei 70 viską kartokite. 
</p>
<?php
$array = [];
foreach(range(0,3) as $arr){
    foreach(range(0,3) as $element){
        $array[$arr][]=rand(1,100);
    }
}

print_r($array);
function sumOfPrimitive(&$array){
    $sumOfPrimitive = 0;
    $countOfPrimitive =0;
    $smallestNumber = 100;
    static $circleOfRecursia = 0;
    foreach($array as $group){
        foreach($group as $number){
            if(numbers($number)===false){
                $sumOfPrimitive += $number;
                $countOfPrimitive++;
                // echo "$number <br>";
            }
            if($number < $smallestNumber){
                $smallestNumber = $number;
                // echo "$number <br>";
            }
        }
    }
    $avarageOfPrimitive = $sumOfPrimitive/$countOfPrimitive;
    if($avarageOfPrimitive < 70){
        $circleOfRecursia++;
        echo "this is $circleOfRecursia circle of recursia <br>";
        min($array);
        foreach ($array as $key => $item) {
            $array[$key][array_search(min($array[$key]), $array[$key])] += 3;
            sumOfPrimitive($array);
    }
} else{
    return $array;
}

}
sumOfPrimitive($array);
print_r($array);
?>
<p>-----------------------------------</p>
<p>Ex: 11.</p>
<p>Sugeneruokite masyvą, kurio ilgis atsitiktinai kinta nuo 10 iki 100. 
Masyvo reikšmes sudaro atsitiktiniai skaičiai 0-100 ir masyvai Santykis skaičiuojamas atsitiktinai,
 bet taip, kad skaičiai sudarytų didesnę dalį nei masyvai. Reikšmių masyvų gylis nuo 1 iki 5, 
 o reikšmės analogiškos (nuo 50% iki 100% atsitiktiniai skaičiai 0-100, o likusios masyvai) ir t.t.
  kol visos galutinės reikšmės bus skaičiai ne masyvai. Suskaičiuoti kiek elementų turi masyvas. 
  Suskaičiuoti masyvo elementų (tie kurie ne masyvai) sumą. Suskaičiuoti maksimalų masyvo gylį. 
  Atvaizduokite masyvą grafiškai . Masyvą pavazduokite kaip div elementą, kuris yra display:flex,
   kurio viduje yra skaičiai. Kiekvienas div elementas turi savo unikalų id ir unikalią background 
   spalvą (spalva pvz nepavaizduota). pvz: <div id=”M1”>10, 46, 67, <div id=”M2”> 89, 45, 89, 34, 90, 
   <div id=”M3”> 84, 97 </div> 90, 56 </div> </div>
</p>
<?php
function arrayCreate(){
    $arr = [];
    $innerArr = rand(1,5);
    $arrLength = rand(10,100);
    $randNumbersAmount = ($arrLength * (rand(50, 100))/100);
    $randArrayLength = $arrLength - $randNumbersAmount;
    foreach(range(0, $arrLength) as $index=>$element){
        if($index < $randNumbersAmount){
            $arr[] = rand(0, 100);
            echo 'aaa<br>';
        } else{ 
            if($innerArr !== 1){
                echo 'bbbb<br>';
                $arr[] =  arrayCreate();
            } else {
                $arr[] = 0;
            }
        }
    }
    return $arr;
}
    print_r(arrayCreate());
?>