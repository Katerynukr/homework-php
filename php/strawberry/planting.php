<?php 
session_start();

/*does session exist*/
if(!isset($_SESSION['berry'])){
    $_SESSION['berry'] = [];
    $_SESSION['strawberryID'] = 0;
}

/*growing a bush*/
if(isset($_POST['plant'])){
    $rand = rand(2,4);
    $imgPath = "./img/strawberry$rand.jpg";
    $_SESSION['berry'][] =[
        'bushNumber' => ++$_SESSION['strawberryID'],
        'berryQuantity'=> 0,
        'imgPath'=> $imgPath
        
    ];
    header('Location: http://localhost/try/php/strawberry/planting.php');
    exit;
}

/*deleating a bush*/
if(isset($_POST['delete'])){
    foreach($_SESSION['berry'] as $id => $strawberry){
        if($_POST['delete'] == $strawberry['bushNumber']){
            unset($_SESSION['berry'][$id]);
            header('Location: http://localhost/try/php/strawberry/planting.php');
            exit;   
        }
    }
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
    Strawberry number : <?= $strawberry['bushNumber'] ?>
    Number of berries : <?= $strawberry['berryQuantity'] ?>
    <button type="submit" name="delete" value="<?= $strawberry['bushNumber'] ?>">Delete</button>
    </div>
    </div>
    <?php endforeach ?>
    <button id="btn" type="submit" name="plant">Grow new bush</button>
</form> 
</body>
</html>
