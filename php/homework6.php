<p>-----------------------------------</p>
<p>Ex: 1.</p>
<p>Parašykite funkciją, kurios argumentas būtų tekstas, kuris 
    yra įterpiamas į h1 tagą</p>
<?php
    function task1($text){
        return $text;
    }
    $sentance = '<h1>BREAKING NEWS</h1>';
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
$final = '';
$numeric ='';
for($i=0; $i<strlen($string);$i++){
    if(is_numeric($string[$i]) && empty($numeric) && (!is_numeric($string[$i+1]))){
        $numeric .= '<h1>';
        $numeric .=$string[$i];
        $numeric .= '</h1>';
        $final .= $numeric;
        $numeric = '';
        echo $string[$i];
    } elseif(is_numeric($string[$i]) && empty($numeric) && is_numeric($string[$i+1])){
        $numeric .= '<h1>';
        $numeric .=$string[$i];
    }elseif(is_numeric($string[$i])&& is_numeric($string[$i+1])&& !empty($numeric)){
         $numeric .=$string[$i];
    } elseif(is_numeric($string[$i])&& !is_numeric($string[$i+1])&& !empty($numeric)){
        $numeric .=$string[$i];
        $numeric .= '</h1>';
        $final .= $numeric;
        $numeric = '';
    } elseif(is_numeric($string[$i])&& [i+1] ===strlen($string) ){
        $numeric .=$string[$i];
        $numeric .= '</h1>';
        $final .= $numeric;
        $numeric = '';
    } else{
       $final .= '<h1>';
       $final .=  $string[$i];
       $final .= '</h1>';
    }
}

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
echo $final;
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
<p>Ex: 1.</p>
<p></p>
<?php

?>
<p>-----------------------------------</p>
<p>Ex: 1.</p>
<p></p>
<?php

?>
<p>-----------------------------------</p>
<p>Ex: 1.</p>
<p></p>
<?php

?>
<p>-----------------------------------</p>
<p>Ex: 1.</p>
<p></p>
<?php

?>
<p>-----------------------------------</p>
<p>Ex: 1.</p>
<p></p>
<?php

?>
<p>-----------------------------------</p>
<p>Ex: 1.</p>
<p></p>
<?php

?>
<p>-----------------------------------</p>
<p>Ex: 1.</p>
<p></p>
<?php

?>
<p>-----------------------------------</p>
<p>Ex: 1.</p>
<p></p>
<?php

?>
<p>-----------------------------------</p>
<p>Ex: 1.</p>
<p></p>
<?php

?>

