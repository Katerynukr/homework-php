<?php 
defined('DOOR_BELL') || die('enter only with log in');

$store= new Garden\Store('garden');
_d($store-> getData());

$fileName = 'planting';

/*planting a strawberry bush*/
if(isset($_POST['plant'])){
    $object = new Garden\Strawberry($store->getNewID());
    $store->sessionSaveNewObject($object);
    Garden\APP::redirect($fileName); 
}

/*planting a blueberyy bush*/
if(isset($_POST['plantBlueberry'])){
    $object = new Garden\Blueberry($store->getNewID());
    $store->sessionSaveNewObject($object);
    Garden\APP::redirect($fileName); 
}

/* planting many strawberry bushes at once*/
if(isset($_POST['howManyPlant'])){
    $amount = (int) $_POST['howMany'];
    Garden\APP::checkObjectsToGrow($amount, $fileName);
    foreach(range(1, $amount) as $strawberry){
        $object = new Garden\Strawberry($store->getNewID());
        $store->sessionSaveNewObject($object);
    }
        Garden\APP::redirect($fileName);
    
}

/* planting many blueberry bushes at once*/
if(isset($_POST['howManyBlueberry'])){
    $amount = (int) $_POST['howMany'];
    Garden\APP::checkObjectsToGrow($amount, $fileName);
    foreach(range(1, $amount) as $blueberry){
        $object = new Garden\Blueberry($store->getNewID());
        $store->sessionSaveNewObject($object);
    }
     Garden\APP::redirect($fileName);
    
}

/*deleating a bush*/
if(isset($_POST['delete'])){
    $store->sessionDeleteObject($fileName, $_POST['delete'] );
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
    <a href="http://localhost/try/php/garden/planting">go to plant</a>
    <a href="http://localhost/try/php/garden/removing">go to collect</a>
    <a href="http://localhost/try/php/garden/growing">go to grow</a>
</div>
<form action="" method="post">
    <div class="garden">
        <?php include __DIR__.'/error.php' ?>
        <?php foreach($store->getAll() as $berry): ?>
        <div class="strawberry">
        <img src=<?=$berry->imgPath?>>
        <div class="description">
        Strawberry number : <?= $berry->bushID ?>
        Number of berries : <?=  $berry->berriesAmount?>
        <button class="btn-s" type="submit" name="delete" value="<?=  $berry -> bushID ?>">Delete</button>
        </div>
        </div>
        <?php endforeach ?>
        <input type="text" name="howMany">
        <div>
        <button id="btn" type="submit" name="howManyPlant">Grow Strawberry </button>
        <button id="btn" type="submit" name="plant">Grow one bush</button>
        </div>
        <div>
        <button id="btn" type="submit" name="howManyBlueberry">Grow Blueberry</button>
        <button id="btn" type="submit" name="plantBlueberry">Grow one bush</button>
        <p><?=$_SESSION['ID'] ?></p>
        </div>
    </div>
</form> 
</body>
</html>
 

<!-- why do we have to use serialize and what for it is used -->