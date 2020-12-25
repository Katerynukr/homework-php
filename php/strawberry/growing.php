<?php
session_start();

/*does session exist*/
if(!isset($_SESSION['berry'])){
    $_SESSION['berry'] = [];
    $_SESSION['strawberryID'] = 0;
}

/*growing berries*/
if(isset($_POST['grow'])){

  foreach($_SESSION['berry'] as &$strawberry){
      $strawberry['berryQuantity'] += $_POST['strawberry'][$strawberry['bushNumber']];
  }
    header('Location: http://localhost/try/php/strawberry/growing.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    body{
        background-color: beige;
    }

    form{
        display:inline-block;
    }
    img{
        object-fit: contain;
        object-position: center;
        height:50px;
    }
    .strawberry{
        display:inline-block;
        width:100%;
        border: 2px solid red;
        padding-top:5px;
        padding-bottom:5px;
        margin-top:5px;
        margin-bottom:5px;
    }
    .description{
        display:inline-block;
        font-size:20px;
    }
</style>
</head>
<body>
<form action="" method="post">
    <?php foreach($_SESSION['berry'] as $strawberry): ?>
    <?php 
    ?>
    <div class="strawberry">
    <img src=<?=$strawberry['imgPath'] ?>>
    <div class="description">
    <?php $toGrow = rand(3, 7) ?>
    <input type="hidden" name="strawberry[<?= $strawberry['bushNumber']?>]" value="<?= $toGrow?>">
    Number of berries : <?= $strawberry['berryQuantity'] ?>
    + <?= $toGrow?>
    </div>
    </div>
    <?php endforeach ?>
    <button id="btn" type="submit" name="grow">Grow berries</button>
</form> 
</body>
</html>
