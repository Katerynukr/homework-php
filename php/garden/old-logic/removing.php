<!-- <?php
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
 -->
