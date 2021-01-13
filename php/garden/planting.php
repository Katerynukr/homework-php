<?php 
defined('DOOR_BELL') || die('enter only with log in');
$store= new Garden\Store('garden');

$fileName = 'planting';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rawData = file_get_contents("php://input");
    $rawData = json_decode($rawData); //decodes json string to object

    //LIST
    if(isset($rawData->list)) {
        ob_start();
        include __DIR__.'/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    }

    //PLANTING
    if($rawData->btnName == 'delete'){ 
        $idToDelete = $rawData->del;
        _d($idToDelete, 'remove');
        $store->deleteObject($fileName, $idToDelete );
    }elseif($rawData->btnName == 'buttonGrowOneStraberry'){

        /*planting a strawberry bush*/

        $object = new Garden\Strawberry($store->getNewID());
        $store->saveNewObject($object);
        
        ob_start();
        include __DIR__.'/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
        
    } elseif($rawData->btnName == 'buttonGrowManyStraberry' ){

        /* planting many strawberry bushes at once*/

        $amount = (int )$rawData->amount;
        if($amount <= 0 || $amount > 4){
            if($amount < 0 || $amount == 0 ){
                $error = 1;
            } elseif($amount > 4){
                $error = 2;
            }
            ob_start();
            include __DIR__.'/error.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['msg' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(400);
            echo $json;
            die;
        }
        foreach(range(1, $amount) as $strawberry){
            $object = new Garden\Strawberry($store->getNewID());
            $store->saveNewObject($object);
        }
            ob_start();
            include __DIR__.'/list.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['list' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(201);
            echo $json;
            die;
    } elseif($rawData->btnName == 'buttonGrowOneBlueberry'  ){

        /*planting a blueberry bush*/

        $object = new Garden\Blueberry($store->getNewID());
        $store->saveNewObject($object);
        
        ob_start();
        include __DIR__.'/list.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
    } elseif($rawData->btnName == 'buttonGrowManyBlueberry'){

        /* planting many blueberry bushes at once*/

        $amount =(int) $rawData->amount;
        $amount = (int )$rawData->amount;
        if($amount <= 0 || $amount > 4){
            if($amount < 0 || $amount == 0 ){
                $error = 1;
            } elseif($amount > 4){
                $error = 2;
            }
            ob_start();
            include __DIR__.'/error.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['msg' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(400);
            echo $json;
            die;
        }
        foreach(range(1, $amount) as $blueberry){
            $object = new Garden\Blueberry($store->getNewID());
            $store->saveNewObject($object);
        }
        ob_start();
        include __DIR__.'/list.php';
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

// /*deleating a bush*/
// if(isset($_POST['delete'])){
//     $store->deleteObject($fileName, $_POST['delete'] );
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
            .btn{
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
<script src="http://localhost/try/php/garden/app.js" defer></script>
<script>const apiUrl = 'http://localhost/try/php/garden/planting';</script>
</head>
<body>
<div class="nav">
    <a href="http://localhost/try/php/garden/planting">go to plant</a>
    <a href="http://localhost/try/php/garden/removing">go to collect</a>
    <a href="http://localhost/try/php/garden/growing">go to grow</a>
</div>
<div id="error"></div>
<form action="" method="POST">
    <div class="garden">
    <div id="list"></div>
        <input type="text" name="howMany">
        <div>
        <button type="button" class="btn" name="howManyPlant" id="growMS">Grow Strawberry </button>
        <button type="button" class="btn" id="growS">Grow one bush</button>
        </div>
        <div>
        <button type="button" class="btn" name="howManyBlueberry" id="growMB">Grow Blueberry</button>
        <button type="button" class="btn" name="plantBlueberry" id="growB">Grow one bush</button>
        </div>
    </div>
</form> 
</body>
</html>