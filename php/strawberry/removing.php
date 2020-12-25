<?php
session_start();


/*does session exist*/
if(!isset($_SESSION['berry'])){
    echo 'You cant collect berries!';
    header('Location: http://localhost/try/php/strawberry/planting.php');
    exit;
}

function myAlert() { 
    echo '<script language="javascript">';
    echo 'alert("message successfully sent")';
    echo '</script>';
} 

/*collecting all berries*/
if(isset($_POST['collectALL'])){
    foreach($_SESSION['berry'] as &$strawberry){
        if($_POST['collectALL'] == $strawberry['bushNumber']){
            if($strawberry['berryQuantity'] != 0 && $strawberry['berryQuantity'] > 0){
                $strawberry['berryQuantity'] = 0; 
            } 
            // elseif($strawberry['berryQuantity'] == 0  && $strawberry['berryQuantity'] < 0) {
                // $visibility = 'none';
                // $err = 'myAlert()';
                // echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 
            // }
        }
    }
    header('Location: http://localhost/try/php/strawberry/removing.php');
    exit;
}
unset($strawberry);

/*deleating all bushes*/
if(isset($_POST['remove'])){
    foreach($_SESSION['berry'] as $id => $strawberry){
            unset($_SESSION['berry'][$id]); 
    }
    header('Location: http://localhost/try/php/strawberry/planting.php');
    exit;  
}

/*colecting specific number of berries*/
if(isset($_POST['collect'])){
    foreach($_SESSION['berry'] as &$strawberry){
        if(is_numeric($_POST['howMany'][$strawberry['bushNumber']])){
            if($_POST['collect'] == $strawberry['bushNumber']){
                if($strawberry['berryQuantity'] > 0 && $strawberry['berryQuantity'] >= $_POST['howMany'][$strawberry['bushNumber']] ){
                    $strawberry['berryQuantity'] -= $_POST['howMany'][$strawberry['bushNumber']]; 
                } 
            }
        }
    }
    header('Location: http://localhost/try/php/strawberry/removing.php');
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
    #collectAll{
        display: <?= $visibility ?>;
    }
</style>
</head>
<body>
<form action="?" method="post">
    <?php foreach($_SESSION['berry'] as $strawberry): ?>
    <?php 
    ?>
    <div class="strawberry">
    <img src=<?=$strawberry['imgPath'] ?>>
    <div class="description">
    Strawberry number : <?= $strawberry['bushNumber'] ?>
    You can collect from the bush : <?= $strawberry['berryQuantity'] ?> berries.
    <input type="text" id="berryNumbers" name="howMany[<?= $strawberry['bushNumber']?>]" value="<?=$_POST['howMany']?>" onkeyup="return checkup(this);">
    <button type="submit" name="collect" value="<?= $strawberry['bushNumber'] ?>">Collect</button>
    <button type="submit" id="collectAll" name="collectALL" value="<?= $strawberry['bushNumber'] ?>">Collect all berries</button>
    </div>
    </div>
    <?php endforeach ?>
    <button id="btn" type="submit" name="remove">Remove all garden</button>
</form> 
<script>
function  checkup(input) {
    input.value = input.value.replace(/[^\d]/g, '');
};

</script>
</body>
</html>
