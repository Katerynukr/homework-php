<?php
defined('DOOR_BELL') || die('enter only with log in');

$store = new Garden\Store('garden');

$fileName = 'removing';
$filePlant = 'planting';

/*does session exist*/
$store->areBerries();


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $rawData = file_get_contents("php://input");
    $rawData = json_decode($rawData, 1); //decodes json string to object

    //LIST
    if(isset($rawData['list'])) {
        ob_start();
        include __DIR__.'/listCollect.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    }

    //COLLECT ALL BUSHES
    if(isset($rawData['btnCollect']) && $rawData['btnCollect'] == 'removeEverything'){
        $store->delete();
        ob_start();
        include __DIR__.'/listCollect.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['output' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
    }
    //COLLECT ALL BERRIES   
    if(isset($rawData['delete']) && $rawData['delete'] == '1'){
        $idToDelete = $rawData['id'];
        $store->collectAllBerries($idToDelete);
        ob_start();
        include __DIR__.'/listCollect.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
    }
    //COLLECT SPECIFIC AMOUNT OF BERRIES
    if(isset($rawData['delete']) && $rawData['delete'] == '2'){
        $idToDelete = $rawData['id'];
        $amount = $rawData['howMuch'];
        $store->collectSpecificAmount($idToDelete, $amount);
        ob_start();
        include __DIR__.'/listCollect.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
    }
}

// //COLLECT ALL BERRIES
// if(isset($_POST['collectALL'])){
//     $store->collectAllBerries();
//     Garden\APP::redirect($fileName); 
// }


// /*deleating all bushes*/
// if(isset($_POST['remove'])){
//     $store->delete();
//     Garden\APP::redirect($filePlant);   
// }

// /*colecting specific number of berries*/
// if(isset($_POST['collect'])){
//     $store->collectSpecificAmount();
//     Garden\APP::redirect($fileName); 
// }
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

            .btn{
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
            .btn:hover{
                background-color:#fff7f1;
                color: #ccae94;
                border: 2px solid #b29881;
                border-radius:20px;
            }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
<script src="http://localhost/try/php/garden/appCollect.js" defer></script>
<script>const apiUrl = 'http://localhost/try/php/garden/removing';</script>
</head>
<body>
<div class="nav">
    <a href="http://localhost/try/php/garden/planting">go to plant</a>
    <a href="http://localhost/try/php/garden/removing">go to collect</a>
    <a href="http://localhost/try/php/garden/growing">go to grow</a>
</div>
<form action="" method="post">
    <div class="garden">
        <div id="listCollect"></div>
        <!-- <?php foreach($store->getALL() as $berry): ?>
        <div class="strawberry">
        <img src=<?=$berry->imgPath ?>>
        <div class="description">
        Bush # <?= $berry->bushID ?>
        Possible to collect: <?= $berry->berriesAmount ?> berries.
        <input type="text" id="berryNumbers" name="howMany[<?= $berry->bushID ?>]" onkeyup="return checkup(this);">
        <button class="btn-s" type="submit" name="collect" value="<?= $berry->bushID ?>">Collect</button>
        <button class="btn-s" type="submit" id="collectAll" name="collectALL" value="<?= $berry -> bushID ?>">Collect all berries</button>
        </div>
        </div>
        <?php endforeach ?> -->
        <button class="btn" id="removeEverything" type="submit" name="remove">Remove all garden</button>
    </div>
</form> 
<script>
function  checkup(input) {
    input.value = input.value.replace(/[^\d]/g, '');
};

</script>
</body>
</html>
