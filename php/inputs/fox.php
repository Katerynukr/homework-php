<?php 
session_start();


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!isset($_POST['option'])){
        $_SESSION['picked'] = 'You forgot to pick an answer!';
    } elseif(4 !== isset($_POST['option'])){
        $_SESSION['picked'] =  'Ooops, wrong answer! Try again!';
    } else {
        $_SESSION['picked'] =  'You are right!';
    }
    header("Location: http://localhost/try/php/inputs/fox.php");
    exit;
}

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
        <img src="./img/animal4.jpg" alt="fox">
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
