<?php 
include __DIR__.'/Strawberry.php';
session_start();


if(!isset($_SESSION['logged']) || 1 != $_SESSION['logged']) {
    header('Location: http://localhost/try/php/garden/planting.php');
    die;
}
/*does session exist*/
if(!isset($_SESSION['garden'])){
    $_SESSION['garden'] = [];
    $_SESSION['ID'] = 0;
}

/*planting a bush*/
if(isset($_POST['plant'])){
    $id = ++$_SESSION['ID'];
    $rand = rand(2,4);
    $imgPath = "./img/strawberry$rand.png";
    $_SESSION['garden'][] =[
        'bush' => new Strawberry($id),
        'imgPath'=> $imgPath
        
    ];
    header('Location: http://localhost/try/php/garden/planting.php');
    exit;
}
_d('sgs');
/* planting many bushes at once*/
if(isset($_POST['howManyPlant'])){
    $amount = (int) $_POST['howMany'];
    echo "<p>$amount</p>";
    if($amount < 0 || $amount > 4){
        if($amount < 0){
            $_SESSION['err'] = 1;
        } elseif($amount > 4){
            $_SESSION['err'] = 2;
        }
        header('Location: http://localhost/try/php/garden/planting.php');
        exit;
    }
    foreach(range(1, $amount) as $strawberry){
        $id = ++$_SESSION['ID'];
        $rand = rand(2,4);
        $imgPath = "./img/strawberry$rand.png";
        $_SESSION['garden'][] =[
            'bush' => new Strawberry($id),
            'imgPath'=> $imgPath
        ];
    }
    header('Location: http://localhost/try/php/garden/planting.php');
    exit;
}

/*deleating a bush*/
if(isset($_POST['delete'])){
    foreach($_SESSION['garden'] as $id => $strawberry){
        $bush = serialize($strawberry['bush']);
        if($_POST['delete'] ==  unserialize($bush) -> bushID ){
            unset($_SESSION['garden'][$id]);
            header('Location: http://localhost/try/php/garden/planting.php');
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
                .btn-s,
                .btn-m{
                    background-color:#ccae94;
                    border: 2px solid #b29881;
                    border-radius:10px;
                    font-weight: bold;
                    color: #fff7f1;
                    line-height:25px;
                    margin-left:15px;
                    outline: 0 solid #b29881;
                }
                .btn-s:hover,
                .btn-m:hover{
                    background-color:#b29881;
                    border: 2px solid #ccae94;
                }
                .btn-m{
                    display:inline-block;
                    float:right;
                    text-decoration:none;
                    padding: 10px;
                    margin:10px;
                }
            input[type=text]{
                line-height:25px;
                border-radius:10px;
                margin-left: 10px;
                width:25px;
                color:#ccae94;
                font-weight: bolder;
                font-size:20px;
                padding: 25px;
                outline: 0 solid #b29881;
                margin-right: 15px;
            }
            #btn{
                width: 180px;
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
            #btn:last-of-type{
             float: right;
            }
            #btn:hover{
                background-color:#fff7f1;
                color: #ccae94;
            }
</style>
</head>
<body>
<a href="login.php?logout" class="btn-m">Log out</a>
<div class="nav">
    <a href="http://localhost/try/php/garden/planting.php">go to plant</a>
    <a href="http://localhost/try/php/garden/removing.php">go to collect</a>
    <a href="http://localhost/try/php/garden/growing.php">go to grow</a>
</div>
<form action="" method="post">
    <div class="garden">
        <?php include __DIR__.'/error.php' ?>
        <?php foreach($_SESSION['garden'] as $strawberry): ?>
        <div class="strawberry">
        <img src=<?=$strawberry['imgPath'] ?>>
        <div class="description">
        <?php $bush = serialize($strawberry['bush']);?>
        Strawberry number : <?= unserialize($bush) -> bushID ?>
        Number of berries : <?=  unserialize($bush) ->  berriesAmount?>
        <button class="btn-s" type="submit" name="delete" value="<?=  unserialize($bush) -> bushID ?>">Delete</button>
        </div>
        </div>
        <?php endforeach ?>
        <input type="text" name="howMany">
        <button id="btn" type="submit" name="howManyPlant">Grow bushes</button>
        <button id="btn" type="submit" name="plant">Grow one bush</button>
        <p><?=$_SESSION['ID'] ?></p>
    </div>
</form> 
</body>
</html>
 

<!-- why do we have to use serialize and what for it is used -->