
<p>-----------------------------------</p>
<p>Ex: 1.</p>
<p>Create two variables that hold a name and surname of your favourite actor.
 Compare the length of two strings and print out a shorter one.</p>
<?php
$name = 'Emilia Isobel Euphemia Rose';
$surname = 'Clarke';
echo strlen($name) > strlen($surname) ? $name : $surname;
?>



<p>-----------------------------------</p>
<p>Ex: 2.</p>
<p>Create two variables that hold a name and surname of your favourite actor.
 Print out name with capital letter and surname with lowercase letters.</p>
<?php
$name = 'Emilia Isobel Euphemia Rose';
$surname = 'Clarke';
print (strtoupper($name) . " " . strtolower($surname));
?>



<p>-----------------------------------</p>
<p>Ex: 3.</p>
<p>Create two variables that hold a name and surname of your favourite actor and third variable that will hold the abbreviation of 
the name and surname. Print out third variable.</p>
<?php 
$actorName = 'Will';
$actorSurname = 'Smith';
$abbr = substr($actorName, 0, 1) . "." . substr($actorSurname, 0, 1) . ".";
print(strtoupper($abbr));
?>



<p>-----------------------------------</p>
<p>Ex: 4.</p>
<p>Create two variables that hold a name and surname of your favourite actor.
 Create third variable that will hold 3 last letters of name and surname. 
 Print out third variable.
</p>
<?php
$actorName = 'Will';
$actorSurname = 'Smith';
// $actorName = 'Li';
// $actorSurname = 'Fa';
$actorName = 'Emilia Isobel Euphemia Rose';
$actorSurname = 'Clarke';
$lastTreeLetters = '';

$re = '/\s+\D/m';
if((preg_match_all($re, $actorName)) > 0 || (preg_match_all($re, $actorSurname)) > 0 ){
    $names = preg_split('/\s+/', $actorName);
    $surnames = preg_split('/\s+/', $actorSurname);
    foreach ($names as $part) {
        if(strlen($part) > 2) {
            $lastTreeLetters .= substr($part, -3);
        } elseif(strlen($part) > 1) {
            $lastTreeLetters .= substr($part, -2);
        } else {
            $lastTreeLetters .= substr($part, -1);
        }
    }  
    foreach ($surnames as $part) {
        if(strlen($part) > 2) {
            $lastTreeLetters .= substr($part, -3);
        } elseif(strlen($part) > 1) {
            $lastTreeLetters .= substr($part, -2);
        } else {
            $lastTreeLetters .= substr($part, -1);
        }
    }   
}else {
    if(strlen($actorName) > 2){
        $lastTreeLetters .= substr($actorName, -3);
    } elseif( strlen($actorName) > 1) {
        $lastTreeLetters .= substr($actorName, -2);
    } else {
        $lastTreeLetters .= substr($actorName, -1);
    } 
    if (strlen($actorSurname) > 2){
        $lastTreeLetters .= substr($actorSurname, -3);
    } elseif( strlen($actorSurname) > 1) {
        $lastTreeLetters .= substr($actorSurname, -2);
    } else {
        $lastTreeLetters .= substr($actorSurname, -1);
    }
    
} 
echo $lastTreeLetters;
?>



<p>-----------------------------------</p>
<p>Ex: 5.</p>
<p>Create a variable “An American in Paris”. In it “a” (lower and uppercase) change to “*”.  Print result.</p>
<?php
$phrase = 'An American in Paris';
$regEx = '/[Aa]/m';
$replace = '*';
echo preg_replace($regEx, $replace, $phrase);
//OR
//$replacedText = str_replace(['a','A'], "*", $phrase);
?>



<p>-----------------------------------</p>
<p>Ex: 6.</p>
<p>Create a variable “An American in Paris”. Count how many times a lowercase and uppercase is met.  Print result.</p>
<?php
$phrase = 'An American in Paris';
$regEx = '/[Aa]/m';
echo preg_match_all($regEx, $phrase);
//OR
// $allAa = substr_count($phrase, 'a') + substr_count($phrase, 'A');
?>



<p>-----------------------------------</p>
<p>Ex: 7.</p>
<p>Create a variable “An American in Paris” and delete in it all vowels. Print result. Repeat with such strings:
 “Breakfast at Tiffany's”, “2001: A Space Odyssey” and “It's a Wonderful Life”.</p>
<?php
$phrase = 'An American in Paris';
$regEx = '/[aeiouAEYUIO]/m';
$replace = '';
echo preg_replace($regEx, $replace, $phrase) . " <br>";
echo preg_replace($regEx, $replace,  'Breakfast at Tiffany\'s') . " <br>";
echo preg_replace($regEx, $replace, '2001: A Space Odyssey') . " <br>";
echo preg_replace($regEx, $replace, 'It\'s a Wonderful Life' . " <br>");

?>



<p>-----------------------------------</p>
<p>Ex: 8.</p>
<p>In a string that generates code: 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope'; Find and print out number of episode.</p>
<?php
$episode = "Star Wars: Episode ". str_repeat(' ', rand(0,5)) . rand(1,9) . " - A New Hope";
$re = '/\d/m';
preg_match($re, $episode, $matches);
echo $matches[0];
//OR
// $episodeNr = (int) filter_var($episode, FILTER_SANITIZE_NUMBER_INT);
// echo '<br>' . $episodeNr;
//OR
// $randomNr = rand(1, 9);
// $starWars = 'Star Wars: Episode ' . str_repeat(' ', rand(0, 5)) . $randomNr . ' - A New Hope';
// echo $starWars;
// echo '<br>';
// echo $randomNr;
?>



<p>-----------------------------------</p>
<p>Ex: 9.</p>
<p> Count how many words less or equal 5 letters in string “Don't Be a Menace to South Central While Drinking Your Juice in the Hood”.
 Repeat code with string “Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale”.
</p>
<?php
$phrase = 'Don\'t Be a Menace to South Central While Drinking Your Juice in the Hood';
$words = preg_split('/\s+/', $phrase);
print_r($words);
echo '<br>-----------<br>';
echo 'Length of words without regEx: <br>';
foreach ($words as $word) {
    echo $word . " length is " . strlen($word) . "<br>";
}
echo '<br>-----------<br>';
echo 'Length of words with regEx: <br>';
$replace = '';
$regEx = '/[^a-zA-Z\d\s]/m';
foreach ($words as $word) {
    if(preg_match_all($regEx, $word)){
        $word = preg_replace($regEx , $replace , $word);
    }
    echo $word . " length is " . strlen($word) . "<br>";
}
$ltWords = preg_split('/\s+/', 'Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale');
echo '<br>-----------<br>';
echo 'Length of lithuanian words: <br>';
foreach ($ltWords as $word) {
    echo $word . " length is " . mb_strlen($word) . "<br>";
}
//OR
// $string1 = "Don't Be a Menace to South Central While Drinking Your Juice in the Hood";
// $string2 = "Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale";
// $array1 = str_word_count($string1, 1, 'ąų');
// $sum = 0;
// for ($i = 0; $i < count($array1); $i++) {
//     if (mb_strlen($array1[$i]) <= 5) {
//         $sum += 1; 
//     }
// }
// echo "Pirmo pavadinimo trumpu z. suma $sum <br>";
// $array2 = str_word_count($string2, 1, 'ąų');
// $sum2 = 0;
// for ($i = 0; $i < count($array2); $i++) {
//     if (mb_strlen($array2[$i]) <= 5) {
//         $sum2 += 1; 
//     }
// }
// echo "Antro pavadinimo trumpu z. suma $sum2 <br>";

?>

 

<p>-----------------------------------</p>
<p>Ex: 10.</p>
<p>Write code that generates random string from large latin letters. Length of the string is supposed to be 3 symbols.</p>
<?php
$randomString = '';
for ($i = 1; $i <=3; $i++) {
    $randomString .= strtoupper(chr(65 + rand(0, 25)));
}
echo $randomString;
//OR
// echo substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'),0, 3);
//OR
// $latinABC = substr(str_shuffle(str_repeat(implode('',range('A', 'Z')),3)),0,3);
// print_r($latinABC);
?>



<p>-----------------------------------</p>
<p>Ex: 11.</p>
<p>Write code that generates random string from 10 random words that should not repeat. The words shoule be taken from exercise 9 and placed in array.</p>
<?php
$randomWords = array("Do", "not", "Be", "a", "Menace", "to", "South", "Central", "While", "Drinking", "Your", "Juice", "in", "the", "Hood",
 "Tik", "nereikia", "gąsdinti", "Pietų", "Centro", "geriant", "sultis", "pas", "save", "kvartale");
$sentence = '';
for ($i = 1; $i <=10; $i++) {
    $arrayLength = count($randomWords);
    $radomIndex = rand(0, ($arrayLength -1));
    $sentence .= $randomWords[$radomIndex] . " ";
    array_splice($randomWords, $radomIndex, 1);
}
$sentence .= ".";
echo $sentence;
?>