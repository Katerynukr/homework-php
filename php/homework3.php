<p>-----------------------------------</p>
<p>Ex: 1.</p>
<p>Display on the creen 400 times "*" symobl.
a.Using CSS styles make all "*" be visible on screen;
b. Make that in one row there would be not more than 50 "*";</p>
<?php
echo 'task A: <br>';
$star = "<p style=\"font-size:9px\";>";
for($i = 1; $i<=400; $i++){
     $star .= '*';
}
$star .= "</p>";
echo $star;
echo 'task B: <br>';
$star1 = "<p>";
for($i = 0; $i< 400; $i++){
    if($i %50 === 0){
        $star1 .= '<br>';
    }
    $star1 .= '*';
}
$star .= "</p>";
echo $star1;
?>

<p>-----------------------------------</p>
<p>Ex: 2.</p>
<p>Generate 300 random numbers from 0 to 300 and print 
    them with a gap in between. Count how many of them 
    are greater than 150.Numbers that are greater than 
    275 should be printed in red color.
</p>
<?php
$arrayOfNumbers = array();
for($i = 0; $i < 300; $i++){
array_push($arrayOfNumbers , rand(0, 300));
}
$countOfLanrgeNumbers = 0;
foreach($arrayOfNumbers as $number){
    if($number > 150){
        $countOfLanrgeNumbers++;
    }
    if($number > 275){
        echo "<p style=\"color:red\";>" . $number."</p>";
    }
}
echo 'Numbers that are larger than 150 : '. $countOfLanrgeNumbers;
?>

<p>-----------------------------------</p>
<p>Ex: 3.</p>
<p> In one row print all numbers from 1 to number between 3000 
    and 4000 that can be divided on 77 without leftover. Numbers print 
    out through the "," and after the last number there should not be 
    ",". If needed use CSS rules that all results would be visible on screen.</p>
<?php
$maxNumber = rand(3000, 4000);
$arrayOfNumbers = array();
for($i = 1; $i <= $maxNumber; $i++){
array_push($arrayOfNumbers , $i);
}
foreach($arrayOfNumbers as $number){
    if($number >= ($maxNumber - 77) && $number%77 === 0){
        echo $number;
    break;
    }
    if($number%77 === 0){
        echo $number . ',';
    }
}


?>

<p>-----------------------------------</p>
<p>Ex: 4.</p>
<p> Paind square from "*" which edges contain 100 "*". 
    Use CSS to make square look actually square.
<!--* * * * * * * * * * *
    * * * * * * * * * * *
    * * * * * * * * * * *
    * * * * * * * * * * *
    * * * * * * * * * * *
    * * * * * * * * * * *
    * * * * * * * * * * * -->
</p>
<?php
echo '<br>';
$picture = "<p style=\"letter-spacing: 5px; font-size:7px\" >";
for($i = 0; $i < 100; $i++){
    for($j = 0; $j < 100; $j++){
        $picture .= '<span>*</span>';
    }
    $picture .= '<br>';
}
$picture .= "</p>";
echo $picture;
?>

<p>-----------------------------------</p>
<p>Ex: 5.</p>
<p>The square from task 4 print with red borders</p>
<?php
echo '<br>';
echo '<br>';
echo '<br>';
$picture = "<p style=\"letter-spacing: 5px; font-size:7px\" >";
for($i = 0; $i < 100; $i++){
    if($i === 0 || $i === 99){
        for($j = 0; $j < 100; $j++){
            $picture .= "<span style=\"color:red; \";>*</span>";
        }
        $picture .= '<br>';  
    } else {
        for($j = 0; $j < 100; $j++){
            if($j === 0 || $j === 99){
                $picture .= "<span style=\"color:red; \";>*</span>";
            }else {
                $picture .= '<span>*</span>';
            }
        }
        $picture .= '<br>';
    }
}
$picture .= "</p>";
echo $picture;
?>

<p>-----------------------------------</p>
<p>Ex: 6.</p>
<p> In this task we are throwing a coin. Result of throwing a coin imitates 
    rand() function, where 0 herb and 1 - number.Result show in the screen: 
    “S” is number, “H” id herb. Create 4 scenarios when the process of 
    throwing a coin is stopped: 
A. you got a herb;
B. you didn't got a herb;
C. you got a herb 3 times;
D. you got a herb 3 times in a row;
</p>
<?php
echo 'condition : A <br>';
$isHerb = false;
while($isHerb === false){
    $result = rand(0, 1);
    if($result === 0){
        echo 'H';
        $isHerb = true;
    } 
    if ($result === 1) {
        echo 'S';
    }
}
echo '<br>';
echo 'condition : B <br>';
$isHerb = true;
while($isHerb){
    $result = rand(0, 1);
    if($result === 0){
        echo 'H';
    } 
    if ($result === 1) {
        echo 'S';
        break;
    }
}
echo '<br>';
echo 'condition : C <br>';
$isHerb = 0;
while($isHerb < 3){
    $result = rand(0, 1);
    if($result === 0){
        echo 'H';
        $isHerb++;
    } 
    if ($result === 1) {
        echo 'S';
    }
}
echo '<br>';
echo 'condition : D <br>';
$string = '';
 $found = 0;
 $re = '/HHH/m';
 while($found === 0){
     if(!preg_match($re, $string)){
     $result = rand(0, 1);
     if($result === 0){
         echo 'H';
         $string .= 'H';
     } 
        if ($result === 1) {
        echo 'S';
        $string .= 'S';
         }
    } else {
        $found = 1;
    }
}
?>

<p>-----------------------------------</p>
<p>Ex: 7.</p>
<p>Kazys and Peter are playing chess. Peter collected points from 
    10 to 20 and Kazys from 5 to 25. In one line print name of a player 
    and number of points. In addition, print out "winner of a game is ..".
    The game wins that player that collects 222 ponts. The game continues 
    till the point when one of the players collect 22 or more points.
</p>
<?php
$pointsPeter = 0;
$pointsKazys = 0;
while($pointsKazys < 222 && $pointsPeter < 222){
    $generatePointsForPeter = rand(10, 20);
    $generatePointsForKazys = rand(5, 25);
    $pointsKazys += $generatePointsForKazys;
    $pointsPeter += $generatePointsForPeter;
    echo 'Peter has ' . $pointsPeter . ' points <br>';
    echo 'Kazys has ' . $pointsKazys . ' points <br>';
}
if($pointsPeter>$pointsKazys){
    echo 'The winner of a game is Peter';
} else{
    echo 'The winner of a game is Kazys';
}
?>

<p>-----------------------------------</p>
<p>Ex: 8.</p>
<p> You should generate  rhombus which height will be 21 rows.
     You have to make each star a random RGB color. </p>
<?php
echo '<div style="text-align:center;">';
$jeff = "21";
$y=1;
for($x=1;$x<=$jeff+1;$x++){
    for($y=1;$y<$x;$y++)
        {
        echo"*";
        }
        echo"<br>";
}
$rey = $jeff-1;
for($x=$rey;$x>=1;$x--){
    for($y=1;$y<$x;$y++)
        {
        echo"*";
        }
        echo"<br>";
}
echo"</div>"
?> 


<p>-----------------------------------</p>
<p>Ex: 9.</p>
<p>Use function microtime(). COunt how many seconds takes code 
    $c = "10 bezdzioniu suvalge 20 bananu."; Do 1 million times and
    compare to the time for printing the code $c = '10 bezdzioniu
    suvalge 20 bananu.';(String int "" and '').
</p>
<?php
$secondsStartOne = microtime(true);
for ($i = 0; $i < 1000000; $i++){
    $c = '10 bezdzioniu \n suvalge 20 bananu.';
}
$secondsEndOne = microtime(true);
$secondsOne = $secondsEndOne - $secondsStartOne;
$secondsStartTwo = microtime(true);
for ($i = 0; $i < 1000000; $i++){
    $c = "10 bezdzioniu \n suvalge 20 bananu.";
}
$secondsEndTwo = microtime(true);
$secondsTwo = $secondsEndTwo - $secondsStartTwo;
echo '  a code with \'\' takes ' . $secondsOne . ' seconds. <br> The other code takes ' . $secondsTwo . ' seconds <br>'; 
?>

<p>-----------------------------------</p>
<p>Ex: 10.</p>
<p>Hammer one nail that is 8.5 cm. You can hit it 5 time and one 
    hit can make a nail go deeper from 5-20 cm.Than you can hit 5 more 
    times and the nail can go in from 20-30 mm deep bet there is a 
    possibility to miss 50%. Count how many times you need to fit a nail.
</p>
<?php
$nailLength = 85;
$bigHit = rand(20, 30);
$hits = 0;
for($i = 0; $i < 5 ; $i++){
    $smallHit = rand(5, 20);
    if($nailLength < $smallHit){
    break;
    }
    $nailLength -= $smallHit ;
    $hits++;
    echo $nailLength . " ";
}
for($i = 0; $i < 5 ; $i++){
    if(rand(0,1) === 0){
        $bigHit = rand(20, 30);
        if($nailLength < $bigHit){
            $bigHit = $nailLength;
            $nailLength -= $bigHit ;
            echo $nailLength . " ";
            $hits++;
            break;
        } else {
            $nailLength -= $bigHit ;
            echo $nailLength . " ";
            $hits++;
            if($nailLength === 0){
            break;
            }
        }
    } else {
        continue;
    }
}
echo "<br> Number of hits was " . $hits;
?>

<p>-----------------------------------</p>
<p>Ex: 11.</p>
<p>Generate a string which will contain 50 numbers from 1 to 200. 
    The numbers should be unique. Generate second string using the
     first string leaving in it only primitive numbers.
Numbers in string has to be organized for, smaller one to bigger.
</p>
<?php
//creating array of unique numbers and from it naming a sting
$numbers = range(1, 200);
shuffle($numbers);
$numbers = array_splice($numbers,0,50);
echo 'This is randomly created array of unique numbers: ';
print_r($numbers);
$numbersString = '';
foreach($numbers as $number){
    $numbersString .= $number . ' ';
}
echo '<br> This is a unique number string where numbers were created randomly ' . $numbersString . '<br>';

//making second array of primitive numbers
$numbersStringTwo = '';
foreach($numbers as $number =>$value){
    $delete = false;
    for($i=2; $i<$number; $i++){
        if($value%$i === 0){
        $delete = true;
        break;
        }
        
    }
    if($delete === true){
        unset($numbers[$number]);
    }
}
//sorting second array and adding its values to a second string
asort($numbers);
foreach($numbers as $number){
    $numbersStringTwo .= $number . ' ';
}
echo 'This is second array of unique primitive numbers which is created from a first one: ';
print_r($numbers);
echo '<br>';
echo 'This is a unique primitive number string with sorted values' . $numbersStringTwo;
?>


