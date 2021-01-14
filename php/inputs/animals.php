<?php 
session_start();
// _d($_POST, 'POST');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!isset($_POST['option'])){
        $_SESSION['picked'] = 'You forgot to pick an answer!';
        $_SESSION['status'] = 0;
    } elseif($_SESSION['correct'] != $_POST['option']){
        $_SESSION['picked'] =  'Ooops, wrong answer! Try again!';
        $_SESSION['status'] = 0;
    } else {
        $_SESSION['picked'] =  'You are right!';
        $_SESSION['status'] = 1;
    }
    header("Location: http://localhost/try/php/inputs/animals.php");
    exit;
}

/*generating a new image if the answer was correct or it is the first tiem page if loaded*/ 
if(!isset($_SESSION['status']) || 1 == $_SESSION['status']){
    $library = [
        ['img' => 'animal1.jpg', 'correct' => 3],
        ['img' => 'animal2.jpg', 'correct' => 1],
        ['img' => 'animal3.jpg', 'correct' => 2],
        ['img' => 'animal4.jpg', 'correct' => 4]
    ];
    shuffle($library);
    $_SESSION['correct'] = $library[0]['correct'];
    $_SESSION['image'] = $library[0]['img'];
    unset($_SESSION['status']);
    _d($library[0]['img'], 'imgif');
    _d($_SESSION['correct'], 'correct');
}else{
    $library[0]['img'] = $_SESSION['image'];
    _d($library[0]['img']);
    _d($_SESSION['correct'], 'correct');
} 


/*showing same picture if the answer was wrong*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .container{
        display:flex;
        align-items:center;
    }
    h2{
        font-size:40px;
    }
    label{
        width:200px;
        font-size:40px;
        display:inline-block;
    }
    button{
        font-size:40px;
        margin-top:15px ;
    }
</style>
<body>
    <div class="container">
        <img src="./img/<?=$library[0]['img']?>" alt="animal">
        <form action="" method="post">
            <?php if(isset($_SESSION['picked'])): ?>
            <h2 style="color:red;"><?= $_SESSION['picked'] ?></h2>
            <?php unset($_SESSION['picked'])?>
            <?php endif ?>
            <div class="options">
                <h2>What animal is shown at the picture?</h2>
                <label>Rabbit</label>
                <input type="radio" name="option" value="1">
            </div>
            <div class="options">
                <label>Deer</label>
                <input type="radio" name="option" value="2">
            </div>
            <div class="options">
                <label>Bear</label>
                <input type="radio" name="option" value="3">
            </div>
            <div class="options">
                <label>Fox</label>
                <input type="radio" name="option" value="4">
            </div>
            <button type="submit" name="selected">Found!</button>
        </form>
    </div>
</body>
</html>

