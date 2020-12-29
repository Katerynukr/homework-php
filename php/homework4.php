<p>-----------------------------------</p>
<p>Ex: 1.</p>
<p>Generate array from 30 elements (with index from 0 to 29), which values will be random from 5 to 25.</p>
<?php
$arrayRandom = [];
for($i = 0; $i < 30; $i++){
$randomValue = rand(5, 25);
$arrayRandom[] = $randomValue;
}
print_r($arrayRandom);
?>


<p>-----------------------------------</p>
<p>Ex: 2.</p>
<p>Use array from the first task. 
    <ul>
        <li>I    Count how many element in array are greater than 10. </li>
        <li>II   Find the largest element in array</li>
        <li>III  Count sum of all values</li>
        <li>IV   Create new array which values created by taking a value from 
                 first ex array and substracting its index </li>
        <li>V    Add to the array additionally 10 elements with a value from 5 to 
                 25. The count of index should be 39.</li>
        <li>VI   From array elements create two new arrays. One array will contain 
                 only odd index numbers and the other event index values</li>
        <li>VII  Array elements with even index numbers should be changed to 0 if 
                 their value is greater than 15</li>
        <li>VIII Find first element that has smallest index and value grater than 10 </li>
        <li>IX   Use function unset() delete all elements that have even index</li>
    </ul>
</p>
<?php
echo '<br>';
echo 'condition : I <br>';
$countOfLargeElements = 0;
foreach($arrayRandom as $value){
    if($value > 10){
        $countOfLargeElements++;
    }
}
unset($value);
echo $countOfLargeElements .' element in array are greater than 10';
echo '<br>';
echo 'condition : II <br>';
$arrayLargestElement = 0;
foreach($arrayRandom as $value){
    if($value > $arrayLargestElement){
        $arrayLargestElement = $value;
    }
}
unset($value);
echo $arrayLargestElement . ' is the largest element in array';
echo '<br>';
echo 'condition : III <br>';
$arraySum = 0;
foreach($arrayRandom as $value){
    $arraySum += $value;
}
unset($value);
echo $arraySum . ' is the sum of all values';
echo '<br>';
echo 'condition : IV <br>';
$newArray = [];
$number = 0;
$i = 0;
foreach($arrayRandom as $index=>$value){
    $number = $value - $index;
    $newArray[$i] = $number;
    $i++;
    }
unset($value);
print_r($newArray);
echo '<br>';
echo 'condition : V <br>';
for($i = 0; $i < 10; $i++){
    $randomValue = rand(5, 25);
    $arrayRandom[] = $randomValue;
    }
print_r($arrayRandom);
echo '<br>';
echo 'condition : VI <br>';
$arrayOdd =[];
$arrayEven = [];
foreach($arrayRandom as $index=>$value){
    if($index === 0 || ($index%2) === 0){
        $arrayEven[] = $value;
    } else {
        $arrayOdd[] = $value;
    }
} 
unset($value);
echo 'this is array from even indexes ';
print_r($arrayEven);
echo '<br>';
'this is array from even indexes ';
print_r($arrayOdd);
echo '<br>';
echo 'condition : VII <br>';
foreach($arrayRandom as $index=>$value){
    if($value>15 && ($index%2) === 0){
        $arrayRandom[$index] = 0;
    } 
} 

echo 'even index number with values greater than 15 are changed to 0';
print_r($arrayRandom);
echo '<br>';
echo 'condition : VIII <br>';
$indexNumber = 0;
foreach($arrayRandom as $index=>$value){
    if($index === $indexNumber && $value>10){
        echo 'This is the first value greater than 10 and with smallest index ' . $value;
        break ;
    } else {
        $indexNumber++;
    }
}
unset($value);
echo '<br>';
echo 'condition : IX <br>';
foreach($arrayRandom as $index=>$value){
    if($index === 0 || ($index%2) === 0){
        unset($arrayRandom[$index]);
    }
}
echo ' This is an array wth deleated all elements with even index ';
print_r($arrayRandom);
?>

<p>-----------------------------------</p>
<p>Ex: 3.</p>
<p>Generate array what has as values randomly placed letters A, B, C and D.
   The length og the array is 200. Count how many there are of each letter/</p>
<?php
$countA = 0;
$countB = 0;
$countC = 0;
$countD = 0;
$arrayLetters = [];
for($i = 0; $i < 200; $i++){
    $rand = rand(1,4);
    if($rand === 1){
        $arrayLetters[] = 'A';
        $countA++;
    } elseif ($rand === 2){
        $arrayLetters[] = 'B';
        $countB++;
    } elseif ($rand === 3){
        $arrayLetters[] = 'C';
        $countC++;
    }  else {
        $arrayLetters[] = 'D';
        $countD++;
    }
}
echo 'Letter A is met ' . $countA . ' times. Letter B is met ', 
$countB . ' times. Letter C is met ', $countC . ' times. Letter D
 is met ' . $countD . ' times.';
?>

<p>-----------------------------------</p>
<p>Ex: 4.</p>
<p>Reorganize array from exercise 3 by alphabet</p>
<?php
sort($arrayLetters);
print_r($arrayLetters);
?>

<p>-----------------------------------</p>
<p>Ex: 5.</p>
<p>Generate 3 arrays same way as in exercise 3. Combine their values.
 Count how many elements were with unique values.</p>
<?php
$array1 = [];
$array2 = [];
$array3 = [];
$arrayResult = [];
for($i = 0; $i < 200; $i++){
    // creating array1
    $randA = rand(1,4);
    if($randA === 1){
        $array1[] = 'A';
    } elseif ($randA === 2){
        $array1[] = 'B';
    } elseif ($randA === 3){
        $array1[] = 'C';
    }  else {
        $array1[] = 'D';
    }
    //creating array2
    $randB = rand(1,4);
    if($randB === 1){
        $array2[] = 'A';
    } elseif ($randB === 2){
        $array2[] = 'B';
    } elseif ($randB === 3){
        $array2[] = 'C';
    }  else {
        $array2[] = 'D';
    }
    //creating array3
    $randC = rand(1,4);
    if($randC === 1){
        $array3[] = 'A';
    } elseif ($randC === 2){
        $array3[] = 'B';
    } elseif ($randC === 3){
        $array3[] = 'C';
    }  else {
        $array3[] = 'D';
    }
}
$keys = array_keys($array1+$array2+$array3);
foreach($keys as $key){
    $arrayResult[$key] = $array1[$key] . $array2[$key] . $array3[$key];
}
echo 'this is a new array '; 
print_r($arrayResult);
echo '<br>';
$uniqueArray = array_unique($arrayResult);
echo 'this is a new unique array '; 
print_r($uniqueArray);
echo '<br>';
?>

<p>-----------------------------------</p>
<p>Ex: 6.</p>
<p>Generate two arrays which vlues will be random from 100 to 999. The length of 
    an array is 100. The values have to be unique.</p>
<?php
$arrNumber1 =[];
$arrNumber2 =[];
$count1 = 0;
$count2 = 0;
while($count1 !==100){
        $rand1 = rand(100, 999);
        if(!in_array($rand1, $arrNumber1)){
            $arrNumber1[] = $rand1;
            $count1++;
        } 
}
while($count2 !==100){
        $rand2 = rand(100, 999);
        if(!in_array($rand2, $arrNumber2)){
        $arrNumber2[] = $rand2;
        $count2++;
        }
}
echo 'this is first array ';
print_r($arrNumber1);
echo '<br>';
echo 'this is seconds array ';
print_r($arrNumber2); 
?> 

<p>-----------------------------------</p>
<p>Ex: 7.</p>
<p>Generate array that will have values that are in array
    1 from previous exercise but are not in the array 2</p>
<?php
$addedArrays = array_merge($arrNumber1, $arrNumber2);
echo ' this is array before deleting same values ';
print_r($addedArrays);
$sameValues = array_intersect($arrNumber1, $arrNumber2);
echo '<br>';
echo 'array with duplicates ';
print_r($sameValues);
echo '<br>';
foreach($addedArrays as$index=>$value){
    if(in_array($value, $sameValues)){
        unset($addedArrays[$index]);
    }
}
unset($value, $index);
echo '<br> this is an array after deleting same values ';
print_r($addedArrays);
?>

<p>-----------------------------------</p>
<p>Ex: 8.</p>
<p>Generate array from elements that repeat in the task 6.</p>
<?php
$addedArrays = array_merge($arrNumber1, $arrNumber2);
$sameValues = array_intersect($arrNumber1, $arrNumber2);
echo '<br>';
echo 'array with duplicates ';
print_r($sameValues);
echo '<br>';
?>

<p>-----------------------------------</p>
<p>Ex: 9.</p>
<p>Generate array which will have indexes from first array and values 
from the second array. Data take from exercise 6. </p>
<?php
echo 'Array which has indexes from one array and values 
from another <br>';
foreach($arrNumber2 as $index=>$numbers){
    $arrNumber1[$index] = $numbers;
}
print_r($arrNumber1);
unset($numbers, $index);
?>

<p>-----------------------------------</p>
<p>Ex: 10.</p>
<p>Generate array from 10 numbers where two first numbers are random from 5 to 
    25. Third number is a sum of third and first. Fourth is a sum os second 
    and third and so on.</p>
<?php
$arraySum = [];
for($i = 0; $i < 10; $i++){
    if($i<2){
        $arraySum[] = rand(5, 25);
    } else {
        $arraySum[] = $arraySum[$i-2] + $arraySum[$i-1];
    }
}
print_r($arraySum);
?>
