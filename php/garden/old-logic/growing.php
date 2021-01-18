<!-- <?php
defined('DOOR_BELL') || die('enter only with log in');

$fileName = 'growing';
$store= new Garden\Store('garden');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $rawData = file_get_contents("php://input");
    $rawData = json_decode($rawData, 1); //decodes json string to object
     //LIST
     if(isset($rawData['list'])) {
        ob_start();
        include __DIR__.'/listOfBerries.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    }
    //GROW
    if(isset($rawData['btnGrow']) && $rawData['btnGrow'] == 'growBerries'){
        $store->grow();
        ob_start();
        include __DIR__.'/listBerriesOf.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['berry' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
    }
}
?> -->
