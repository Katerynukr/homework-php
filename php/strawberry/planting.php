<?php 
session_start();

if(!isset($_SESSION['logged']) || 1 != $_SESSION['logged']) {
    header('Location: http://localhost/try/php/strawberry/login.php');
    die;
}
/*does session exist*/
if(!isset($_SESSION['berry'])){
    $_SESSION['berry'] = [];
    $_SESSION['strawberryID'] = 0;
}

/*planting a bush*/
if(isset($_POST['plant'])){
    $rand = rand(2,4);
    $imgPath = "./img/strawberry$rand.png";
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
        background-color: #FFDAB9;
    }

        form{
            /* display:inline-block; */
        }
            .nav{
                display:inline-block;
                width:100%;
                padding-top: 20px;
                padding-bottom: 20px;
                text-align:center;
                margin-top:40px;
            }
                .nav > a{
                    text-decoration: none;
                    margin-left: 10px;
                    border: 2px solid #ccae94;
                    margin: 30px;
                    background-color:#fff7f1;
                    padding: 25px;
                    border-radius: 15px;
                    font-size: 20px;
                    font-weight: bold;
                    color: #ccae94;
                    text-shadow: 3px 0 0 #fff5ec;
                }
                .nav > a:hover{
                    background-color:#ccae94;
                    border: 2px solid #fff5ec;
                    color:#fff7f1;
                    font-weight: bolder;
                    text-shadow: 3px 0 0 #ccae94;
                }
            .garden{
                display: inline-block;
                width: 800px;
                margin-left: calc( (100% - 800px) / 2 );
                padding: 50px;
                border: 15px solid #fff7f1;
                border-radius:20px;
                margin-top: 5%;
            }
                img{
                    object-fit: contain;
                    object-position: center;
                    height:50px;
                    padding:5px 5px 0 5px;
                }
                .strawberry{
                    display:inline-block;
                    width:100%;
                    border: 4px solid #fff5ec;
                    border-radius: 15px;
                    padding-top:5px;
                    padding-bottom:5px;
                    margin-top:5px;
                    margin-bottom:5px;
                }
                .strawberry:hover{
                    background-color: #fff5ec; 
                    border-color: #e5c4a6;
                }

                .description{
                    display:inline-block;
                    font-size:30px;
                    color: #ccae94;
                    text-shadow: 2px 0 0 #fff5ec;
                    font-weight: bold;
                }
                .btn-s{
                    background-color:#ccae94;
                    border: 2px solid #b29881;
                    border-radius:10px;
                    font-weight: bold;
                    color: #fff7f1;
                    line-height:25px;
                    margin-left:15px;
                    outline: 0 solid #b29881;
                }
                .btn-s:hover{
                    background-color:#b29881;
                    border: 2px solid #ccae94;
                }
            #btn{
                width: 180px;
                margin-left: calc( (100% - 180px) / 2 );
                margin-top: 10px;
                background-color:#ccae94;
                border: 2px solid #b29881;
                padding: 25px;
                font-size: 20px;
                font-weight: bold;
                color: #fff7f1;
                border-radius:20px;
                outline: 0 solid #b29881;
            }
            #btn:hover{
                background-color:#fff7f1;
                color: #ccae94;
            }
</style>
</head>
<body>
<a href="login.php?logout">Log out</a>
<div class="nav">
    <a href="http://localhost/try/php/strawberry/planting.php">go to plant</a>
    <a href="http://localhost/try/php/strawberry/removing.php">go to collect</a>
    <a href="http://localhost/try/php/strawberry/growing.php">go to grow</a>
</div>
<form action="" method="post">
    <div class="garden">
        <?php foreach($_SESSION['berry'] as $strawberry): ?>
        <div class="strawberry">
        <img src=<?=$strawberry['imgPath'] ?>>
        <div class="description">
        Strawberry number : <?= $strawberry['bushNumber'] ?>
        Number of berries : <?= $strawberry['berryQuantity'] ?>
        <button class="btn-s" type="submit" name="delete" value="<?= $strawberry['bushNumber'] ?>">Delete</button>
        </div>
        </div>
        <?php endforeach ?>
        <button id="btn" type="submit" name="plant">Grow new bush</button>
    </div>
</form> 
</body>
</html>
