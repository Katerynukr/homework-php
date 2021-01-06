<?php
session_start();
// session_destroy();

include __DIR__.'/APP.php';
include __DIR__.'/Berries.php';
include __DIR__.'/Strawberry.php';
include __DIR__.'/Blueberry.php';

$fileName = 'growing.php';

/*does session exist*/
if(!isset($_SESSION['garden'])){
    $_SESSION['garden'] = [];
    $_SESSION['ID'] = 0;
}

/*growing berries*/
if(isset($_POST['grow'])){
    APP::grow();
    APP::redirect($fileName); 
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
<div class="nav">
    <a href="http://localhost/try/php/garden/planting.php">go to plant</a>
    <a href="http://localhost/try/php/garden/removing.php">go to collect</a>
    <a href="http://localhost/try/php/garden/growing.php">go to grow</a>
</div>
<form action="" method="post">
    <div class="garden">
        <?php foreach($_SESSION['garden'] as $berry): ?>
        <?php $bush =  APP::objectUnserialize($berry)?>
        <?php _d($bush, 'foeach')?>
        <div class="strawberry">
        <img src=<?=$bush->imgPath?>>
        <div class="description">
        <input type="hidden" name="berry[<?= $bush -> bushID ?>]">
        Number of berries : <?= $bush ->  berriesAmount ?>
        + <?=$bush ->toGrow ?>
        </div>
        </div>
        <?php endforeach ?>
        <button id="btn" type="submit" name="grow">Grow berries</button>
    </div>
</form> 
</body>
</html>

<!-- why was not working method on unserialised object -->
