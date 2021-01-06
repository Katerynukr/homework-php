<?php
session_start();

include __DIR__.'/APP.php';
include __DIR__.'/Berries.php';
include __DIR__.'/Strawberry.php';
include __DIR__.'/Blueberry.php';

$fileName = 'removing.php';
$filePlant = 'planting.php';

/*does session exist*/
if(!isset($_SESSION['garden'])){
    echo 'You can\'t collect berries!';
    APP::redirect($fileName); 
}

function myAlert() { 
    echo '<script language="javascript">';
    echo 'alert("message successfully sent")';
    echo '</script>';
} 

/*collecting all berries*/
if(isset($_POST['collectALL'])){
    foreach($_SESSION['garden'] as $index => $berry){
        $bush =  APP::objectUnserialize($berry);
        if($_POST['collectALL'] == $bush ->  bushID){
            $bush-> collectAll();
            $_SESSION['garden'][$index] =  APP::objectSerialize($bush);
        }
    }
    APP::redirect($fileName); 
}


/*deleating all bushes*/
if(isset($_POST['remove'])){
    APP::delete();
    APP::redirect($filePlant);   
}

/*colecting specific number of berries*/
if(isset($_POST['collect'])){
    foreach($_SESSION['garden'] as $index => $berry){
        $bush = unserialize($berry);
        if($_POST['collect'] == $bush ->  bushID){
            if($_POST['howMany'][ $bush -> bushID ] !== ''){
                $howmuch = $_POST['howMany'][ $bush -> bushID ];
                $bush -> collect($howmuch);
                $_SESSION['garden'][$index] =  APP::objectSerialize($bush);
            }
        }
    }
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
                    outline: 0 solid #b29881;
                }
            .garden{
                display: inline-block;
                float:left;
                width: 1000px;
                margin-left: calc( (100% - 1000px) / 2 );
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
                input[type=text]{
                    line-height:25px;
                    border-radius:10px;
                    margin-left: 10px;
                    width:25px;
                    color:#ccae94;
                    font-weight: bolder;
                    font-size:15px;
                    outline: 0 solid #b29881;
                }
                .btn-s{
                    background-color:#ccae94;
                    border: 2px solid #b29881;
                    border-radius:10px;
                    font-weight: bold;
                    color: #fff7f1;
                    line-height:25px;
                    outline: 0 solid #b29881;
                }
                .btn-s:hover{
                    background-color:#b29881;
                    border: 2px solid #ccae94;
                }
                .btn-s:last-of-type{
                    margin-left:40px;
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
                border: 2px solid #b29881;
                border-radius:20px;
            }
</style>
</head>
<body>
<div class="nav">
    <a href="http://localhost/try/php/garden/planting.php">go to plant</a>
    <a href="http://localhost/try/php/garden/removing.php">go to collect</a>
    <a href="http://localhost/try/php/garden/growing.php">go to grow</a>
</div>
<form action="?" method="post">
    <div class="garden">
        <?php foreach($_SESSION['garden'] as $berry): ?>
        <?php $bush = APP::objectUnserialize($berry);?>
        <div class="strawberry">
        <img src=<?=$bush-> imgPath ?>>
        <div class="description">
        Bush # <?= $bush -> bushID ?>
        Possible to collect: <?= $bush ->  berriesAmount ?> berries.
        <input type="text" id="berryNumbers" name="howMany[<?= $bush -> bushID?>]" onkeyup="return checkup(this);">
        <button class="btn-s" type="submit" name="collect" value="<?= $bush -> bushID ?>">Collect</button>
        <button class="btn-s" type="submit" id="collectAll" name="collectALL" value="<?= $bush -> bushID ?>">Collect all berries</button>
        </div>
        </div>
        <?php endforeach ?>
        <button id="btn" type="submit" name="remove">Remove all garden</button>
    </div>
</form> 
<script>
function  checkup(input) {
    input.value = input.value.replace(/[^\d]/g, '');
};

</script>
</body>
</html>
